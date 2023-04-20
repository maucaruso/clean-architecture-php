<?php

namespace PHP\Architecture\Gamificacao\Dominio\Selo;

use PHP\Architecture\Shared\Dominio\CPF;

interface RepositorioDeSelo
{
  public function adiciona(Selo $selo): void;
  public function selosDeAlunoComCpf(CPF $cpf);
}