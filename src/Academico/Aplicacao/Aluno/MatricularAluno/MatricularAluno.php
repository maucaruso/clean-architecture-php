<?php

namespace PHP\Architecture\Academico\Aplicacao\Aluno\MatricularAluno;

use PHP\Architecture\Academico\Dominio\Aluno\Aluno;
use PHP\Architecture\Academico\Dominio\Aluno\AlunoMatriculado;
use PHP\Architecture\Academico\Dominio\Aluno\LogDeAlunoMatriculado;
use PHP\Architecture\Academico\Dominio\Aluno\RepositorioDeAluno;
use PHP\Architecture\Shared\Dominio\Evento\PublicadorDeEvento;

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
