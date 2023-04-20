<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Shared\Dominio\CPF;
use PHP\Architecture\Shared\Dominio\Evento\Evento;

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
  
  public function nome(): string {
    return "aluno_matriculado";
  }
  
  public function jsonSerialize(): mixed 
  {
    return get_object_vars($this);
  }
}