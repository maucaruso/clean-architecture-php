<?php

namespace PHP\Architecture\Tests\Aplicacao\Aluno;

use PHP\Architecture\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use PHP\Architecture\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\CPF;
use PHP\Architecture\Infra\Aluno\RepositorioDeAlunosEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAlunoTest extends TestCase
{
  public function testAlunoDeveSerAdicionadoAoRepositorio()
  {
    $dadosAluno = new MatricularAlunoDto("123.456.789-10", "luci lamar", "teste@teste.com");
    
    $repositorioDeAluno = new RepositorioDeAlunosEmMemoria();
    $useCase = new MatricularAluno($repositorioDeAluno);
    
    $useCase->executa($dadosAluno);
    
    $aluno = $repositorioDeAluno->buscarPorCpf(new CPF($dadosAluno->cpfAluno));
    
    $this->assertSame('luci lamar', $aluno->nome());
    $this->assertSame('teste@teste.com', $aluno->email());
    $this->assertSame('123.456.789-10', $aluno->cpf());
    
    $this->assertEmpty($aluno->telefones());
  }
}