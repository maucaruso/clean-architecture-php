<?php

namespace PHP\Architecture\Tests\Academico\Dominio;

use PHP\Architecture\Academico\Dominio\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
  public function testEmailNoFormatoInvalidoNaoDevePoderExistir()
  {
    $this->expectException(\InvalidArgumentException::class);
    new Email('email inválido');
  }

  public function testEmailDevePoderSerRepresentadoComoString()
  {
    $email = new Email('endereco@example.com');
    $this->assertSame('endereco@example.com', (string) $email);
  }
} 