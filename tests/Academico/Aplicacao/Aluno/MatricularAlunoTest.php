<?php

namespace PHP\Architecture\Tests\Academico\Aplicacao\Aluno;

use PHP\Architecture\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use PHP\Architecture\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use PHP\Architecture\Academico\Dominio\Aluno\Aluno;
use PHP\Architecture\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use PHP\Architecture\Shared\Dominio\Evento\PublicadorDeEvento;
use PHP\Architecture\Shared\Dominio\CPF;
use PHP\Architecture\Academico\Infra\Aluno\RepositorioDeAlunosEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
  public function testAlunoDeveSerAdicionadoAoRepositorio()
  {
    $publicador = new PublicadorDeEvento();
    $publicador->adicionarOuvinte(new LogDeAlunoMatriculado());
    
    $dadosAluno = new MatricularAlunoDto("123.456.789-10", "luci lamar", "teste@teste.com");
    
    $repositorioDeAluno = new RepositorioDeAlunosEmMemoria();
    $useCase = new MatricularAluno($repositorioDeAluno, $publicador);
    
    $useCase->executa($dadosAluno);
    
    $aluno = $repositorioDeAluno->buscarPorCpf(new CPF($dadosAluno->cpfAluno));
    
    $this->assertSame('luci lamar', $aluno->nome());
    $this->assertSame('teste@teste.com', $aluno->email());
    $this->assertSame('123.456.789-10', (string) $aluno->cpf());
    
    $this->assertEmpty($aluno->telefones());
  }
}