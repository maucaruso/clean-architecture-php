<?php

namespace PHP\Architecture\Infra\Aluno;

use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\Aluno\AlunoNaoEncontrado;
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

  public function buscarPorCpf(CPF $cpf): Aluno {
    $sql = '
      SELECT cpf, nome, email, ddd, numero as numero_telefone
      FROM alunos
      LEFT JOIN telefones ON telefones.cpf_aluno = alunos.cpf
      WHERE alunos.pf = ?;
    ';
    
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(1, (string) $cpf);
    $stmt->execute();
    
    $dadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    
    if (count($dadosAluno) === 0) {
      throw new AlunoNaoEncontrado($cpf);
    }
    
    return $this->mapearAluno($dadosAluno);
  }
  
  private function mapearAluno($dadosAluno): Aluno
  {
    $primeiraLinha = $dadosAluno[0];
    $aluno = Aluno::comCpfNomeEEmail($primeiraLinha['cpf'], $primeiraLinha['nome'], $primeiraLinha['email']);
    $telefones = array_filter($dadosAluno, fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null);
    
    foreach ($telefones as $linha) {
      $aluno->adicionarTelefone($linha['ddd'], $linha['numero_telefone']);
    }
    
    return $aluno;
  }

  public function buscarTodos(): array {
    
  }
}