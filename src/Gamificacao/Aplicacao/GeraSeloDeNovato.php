<?php

namespace PHP\Architecture\Gamificacao\Aplicacao;

use PHP\Architecture\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use PHP\Architecture\Gamificacao\Dominio\Selo\Selo;
use PHP\Architecture\Shared\Dominio\Evento\Evento;
use PHP\Architecture\Shared\Dominio\Evento\OuvinteDeEvento;

class GeraSeloDeNovato extends OuvinteDeEvento
{
  private RepositorioDeSelo $repositorioDeSelo;
  
  public function __construct(RepositorioDeSelo $repositorioDeSelo)
  {
    $this->repositorioDeSelo = $repositorioDeSelo;
  }
  
  public function sabeProcessar(Evento $evento): bool
  {
    return $evento->nome() === "aluno_matriculado";
  }

  public function reageAo(Evento $evento): void
  {
    $array = $evento->jsonSerialize();
    $cpf = $array['cpfAluno'];
    
    $selo = new Selo($cpf, 'Novato');
    $this->repositorioDeSelo->adiciona($selo);
  }
}