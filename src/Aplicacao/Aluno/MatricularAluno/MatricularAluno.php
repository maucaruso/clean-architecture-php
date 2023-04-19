<?php

namespace PHP\Architecture\Aplicacao\Aluno\MatricularAluno;

use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\Aluno\AlunoMatriculado;
use PHP\Architecture\Dominio\Aluno\LogDeAlunoMatriculado;
use PHP\Architecture\Dominio\Aluno\RepositorioDeAluno;
use PHP\Architecture\Dominio\PublicadorDeEvento;

class MatricularAluno
{
  private RepositorioDeAluno $repositorioDeAluno;
  private PublicadorDeEvento $publicador;
  
  public function __construct(RepositorioDeAluno $repositorioDeAluno, PublicadorDeEvento $publicador)
  {
    $this->repositorioDeAluno = $repositorioDeAluno;
    $this->publicador = $publicador;
  }
  
  public function executa(MatricularAlunoDto $dados): void
  {
    $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
    $this->repositorioDeAluno->adicionar($aluno);
    
    $evento = new AlunoMatriculado($aluno->cpf());
    $this->publicador->publicar($evento);
  }
}
