<?php

namespace PHP\Architecture\Dominio\Aluno;

use PHP\Architecture\Dominio\CPF;

class AlunoNaoEncontrado extends \DomainException
{
  public function __construct(CPF $cpf)
  {
    parent::__construct("Aluno com CPF $cpf não encontrado");
  }
}