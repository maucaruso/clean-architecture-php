<?php

namespace PHP\Architecture\Aplicacao\Indicacao;

use PHP\Architecture\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
  public function enviaPara(Aluno $alunoIndicado): void;
}