<?php

use PHP\Architecture\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use PHP\Architecture\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use PHP\Architecture\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use PHP\Architecture\Academico\Infra\Aluno\RepositorioDeAlunosEmMemoria;
use PHP\Architecture\Gamificacao\Aplicacao\GeraSeloDeNovato;
use PHP\Architecture\Gamificacao\Infra\Selo\RepositorioDeSeloEmMemoria;
use PHP\Architecture\Shared\Dominio\Evento\PublicadorDeEvento;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
// $ddd = $argv[4];
// $numero = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
$publicador->adicionarOuvinte(new GeraSeloDeNovato(new RepositorioDeSeloEmMemoria()));

$useCase = new MatricularAluno(new RepositorioDeAlunosEmMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));

// php matricular-aluno.php "123.456.789-10" "luci lamar" "teste@teste.com" "11" "34566543"