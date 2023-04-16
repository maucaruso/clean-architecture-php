<?php

namespace PHP\Architecture\Infra\Aluno;

use PHP\Architecture\Dominio\Aluno\Aluno;
use PHP\Architecture\Dominio\Aluno\AlunoNaoEncontrado;
use PHP\Architecture\Dominio\Aluno\RepositorioDeAluno;
use PHP\Architecture\Dominio\CPF;

class RepositorioDeAlunosEmMemoria implements RepositorioDeAluno
{
  private array $alunos = [];
  
  public function adicionar(Aluno $aluno): void {
    $this->alunos[] = $aluno;
  }

  public function buscarPorCpf(CPF $cpf): Aluno 
  {
    $alunosFiltrados = array_filter($this->alunos, fn (Aluno $aluno) => $aluno->cpf() == $cpf);
    
    if (count($alunosFiltrados) === 0) {
      throw new AlunoNaoEncontrado($cpf);
    }
    
    if (count($alunosFiltrados) > 1) {
      throw new \Exception("Existe mais de um aluno cadastrado com este mesmo CPF.");
    }
    
    return $alunosFiltrados[0];
  }

  public function buscarTodos(): array {
    return $this->alunos;
  } 
}