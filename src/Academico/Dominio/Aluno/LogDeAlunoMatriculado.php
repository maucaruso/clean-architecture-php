<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Shared\Dominio\Evento\Evento;
use PHP\Architecture\Shared\Dominio\Evento\OuvinteDeEvento;

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
    return $evento->nome() === "aluno_matriculado";
  }
}