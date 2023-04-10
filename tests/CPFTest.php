<?php

namespace PHP\Architecture\Tests;

use PHP\Architecture\Dominio\CPF;
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
    $cpf = new CPF('123.456.789-10');
    $this->assertSame('123.456.789-10', (string) $cpf);
  }
}