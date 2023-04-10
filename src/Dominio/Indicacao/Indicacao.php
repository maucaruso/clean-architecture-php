<?php

namespace PHP\Architecture\Dominio\Indicacao;

use PHP\Architecture\Dominio\Aluno\Aluno;

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