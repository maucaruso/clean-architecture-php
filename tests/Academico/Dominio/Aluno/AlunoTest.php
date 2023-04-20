<?php

namespace PHP\Architecture\Tests\Academico\Dominio\Aluno;

use PHP\Architecture\Academico\Dominio\Aluno\Aluno;
use PHP\Architecture\Shared\Dominio\CPF;
use PHP\Architecture\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class AlunoTest extends TestCase
{
  private Aluno $aluno;
  
  protected function setUp(): void
  {
    $this->aluno = new Aluno(
      $this->createStub(CPF::class),
      '',
      $this->createStub(Email::class)
    );
  }
  
  public function testAdicionarMaisDe2TelefonesDeveLancarExcecao()
  {
    $this->expectException(\DomainException::class);
    
    $this->aluno->adicionarTelefone('24', '22222222');
    $this->aluno->adicionarTelefone('24', '333333333');
    $this->aluno->adicionarTelefone('24', '44444444');
  }
  
  public function testAdicionar1TelefoneDeveFuncionar()
  {
    $this->aluno->adicionarTelefone('24', '22222222');
    $this->assertCount(1, $this->aluno->telefones());
  }
  
  public function testAdicionar2TelefonesDeveFuncionar()
  {
    $this->aluno->adicionarTelefone('24', '22222222');
    $this->aluno->adicionarTelefone('24', '333333333');
    $this->assertCount(2, $this->aluno->telefones());
  }
}