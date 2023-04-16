<?php

namespace PHP\Architecture\Aplicacao\Aluno\MatricularAluno;

use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\Aluno\RepositorioDeAluno;

class MatricularAluno
{
  private RepositorioDeAluno $repositorioDeAluno;
  
  public function __construct(RepositorioDeAluno $repositorioDeAluno)
  {
    $this->repositorioDeAluno = $repositorioDeAluno;
  }
  
  public function executa(MatricularAlunoDto $dados): void
  {
    $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
    $this->repositorioDeAluno->adicionar($aluno);
  }
}
