<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Academico\Dominio\CPF;
use PHP\Architecture\Academico\Dominio\Evento;

class AlunoMatriculado implements Evento
{
  private \DateTimeImmutable $momento;
  private CPF $cpfAluno;
  
  public function __construct(CPF $cpfAluno)
  {
    $this->momento = new \DateTimeImmutable();
    $this->cpfAluno = $cpfAluno;
  }
  
  public function cpfAluno(): CPF
  {
    return $this->cpfAluno;
  }
  
  public function momento(): \DateTimeImmutable
  {
    return $this->momento;
  }
}