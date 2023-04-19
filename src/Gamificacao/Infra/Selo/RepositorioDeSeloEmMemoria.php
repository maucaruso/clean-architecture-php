<?php

namespace PHP\Architecture\Gamificacao\Infra\Selo;

use PHP\Architecture\Dominio\CPF;
use PHP\Architecture\Dominio\Selo\RepositorioDeSelo;
use PHP\Architecture\Dominio\Selo\Selo;

class RepositorioDeSeloEmMemoria implements RepositorioDeSelo
{
  private array $selos = [];
  
  public function adiciona(Selo $selo): void
  {
    $this->selos[] = $selo;
  }

  public function selosDeAlunoComCpf(CPF $cpf)
  {
    return array_filter($this->selos, fn (Selo $selo) => $selo->cpfAluno() === $cpf);
  }
}