<?php

namespace PHP\Architecture\Indicacao;

use PHP\Architecture\Aluno\Aluno;

class Indicacao
{
  private Aluno $indicante;
  private Aluno $indicado;
  private \DateTimeImmutable $data;
  
  public function __construct(Aluno $indicante, Aluno $indicado)
  {
    $this->indicante = $indicante;
    $this->indicado = $indicado;
    
    $this->data = new \DateTimeImmutable();
  }
}