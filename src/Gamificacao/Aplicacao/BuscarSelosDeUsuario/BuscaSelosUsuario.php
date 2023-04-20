<?php

namespace PHP\Architecture\Gamificacao\Aplicacao\BuscarSelosDeUsuario;

use PHP\Architecture\Gamificacao\Dominio\Selo\RepositorioDeSelo;
use PHP\Architecture\Shared\Dominio\CPF;

class BuscaSelosUsuario
{
  private RepositorioDeSelo $repositorioDeSelo;
  
  public function __construct(RepositorioDeSelo $repositorioDeSelo)
  {
    $this->repositorioDeSelo = $repositorioDeSelo;
  }
  
  public function execute(BuscarSelosUsuarioDto $dados)
  {
    $cpfAluno = new CPF($dados->cpfAluno);
    return $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
  }
}