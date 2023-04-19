<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Academico\Dominio\Evento;
use PHP\Architecture\Academico\Dominio\OuvinteDeEvento;

class LogDeAlunoMatriculado extends OuvinteDeEvento
{
  
  /**
   * @param AlunoMatriculado $alunoMatriculado
   */
  public function reageAo(Evento $alunoMatriculado): void
  {    
    fprintf(
      STDERR,
      "Aluno com CPF %s foi matriculado na data %s",
      (string) $alunoMatriculado->cpfAluno(),
      $alunoMatriculado->momento()->format('d/m/Y')
    );
  }
  
  public function sabeProcessar(Evento $evento): bool {
    return $evento instanceof AlunoMatriculado;
  }
}