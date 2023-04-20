<?php

namespace PHP\Architecture\Tests\Shared\Dominio;

use PHP\Architecture\Shared\Dominio\CPF;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
  public function testCpfNumeroNoFormatoInvalidoNaoDevePoderExistir()
  {
    $this->expectException(\InvalidArgumentException::class);
    new CPF('12345678910');
  }

  public function testCpfDevePoderSerRepresentadoComoString()
  {
    $cpf = new CPF('132.456.789-10');
    $this->assertSame('132.456.789-10', (string) $cpf);
  }
}