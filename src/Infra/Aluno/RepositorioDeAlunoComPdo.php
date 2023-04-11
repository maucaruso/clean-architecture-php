<?php

namespace PHP\Architecture\Infra\Aluno;

use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\Aluno\RepositorioDeAluno;
use PHP\Architecture\Dominio\CPF;

class RepositorioDeAlunoComPdo implements RepositorioDeAluno
{
  private \PDO $conexao;
  
  public function __construct(\PDO $conexao)
  {
    $this->conexao = $conexao;
  }

  public function adicionar(Aluno $aluno): void {
    $sql = 'INSERT INTO alunos VALUES (:cpf, :nome, :email);';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue('cpf', $aluno->cpf());
    $stmt->bindValue('nome', $aluno->nome());
    $stmt->bindValue('email', $aluno->email());
    $stmt->execute();
    
    $sql = 'INSERT INTO telefones VALUES (:ddd, :numero, :cpf_aluno);';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue('cpf_aluno', $aluno->cpf());
    
    /** @var Telefone $telefone */
    foreach ($aluno->telefones() as $telefone) {      
      $stmt->bindValue('ddd', $telefone->ddd());
      $stmt->bindValue('numero', $telefone->numero());
      $stmt->execute();
    }
  }

  public function buscarPorCpf(CPF $cpf): Aluno { }

  public function buscarTodos(): array { }
}