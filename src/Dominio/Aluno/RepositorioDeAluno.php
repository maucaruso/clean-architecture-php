<?php

namespace PHP\Architecture\Dominio\Aluno;

use PHP\Architecture\Dominio\CPF;

interface RepositorioDeAluno
{
  public function adicionar(Aluno $aluno): void;
  public function buscarPorCpf(CPF $cpf): Aluno;
  /** @return Aluno[] */
  public function buscarTodos(): array;
}