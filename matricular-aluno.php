<?php

use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Infra\Aluno\RepositorioDeAlunosEmMemoria;

require 'vendor/autoload.php';

$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];

$aluno = Aluno::comCpfNomeEEmail($cpf, $nome, $email)->adicionarTelefone($ddd, $numero);
$repositorio = new RepositorioDeAlunosEmMemoria();
$repositorio->adicionar($aluno);

// php matricular-aluno.php "123.456.789-10" "luci lamar" "teste@teste.com" "11" "34566543"