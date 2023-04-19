<?php

use PHP\Architecture\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use PHP\Architecture\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\Aluno\LogDeAlunoMatriculado;
use PHP\Architecture\Dominio\PublicadorDeEvento;
use PHP\Architecture\Infra\Aluno\RepositorioDeAlunosEmMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
// $ddd = $argv[4];
// $numero = $argv[5];

$publicador = new PublicadorDeEvento();
$publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
$useCase = new MatricularAluno(new RepositorioDeAlunosEmMemoria(), $publicador);

$useCase->executa(new MatricularAlunoDto($cpf, $nome, $email));

// php matricular-aluno.php "123.456.789-10" "luci lamar" "teste@teste.com" "11" "34566543"