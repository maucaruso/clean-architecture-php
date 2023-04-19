<?php

namespace PHP\Architecture\Academico\Aplicacao\Indicacao;

use PHP\Architecture\Academico\Dominio\Aluno\Aluno;

interface EnviaEmailIndicacao
{
  public function enviaPara(Aluno $alunoIndicado): void;
}