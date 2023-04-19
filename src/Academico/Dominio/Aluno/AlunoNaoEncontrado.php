<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Academico\Dominio\CPF;

class AlunoNaoEncontrado extends \DomainException
{
  public function __construct(CPF $cpf)
  {
    parent::__construct("Aluno com CPF $cpf não encontrado");
  }
}