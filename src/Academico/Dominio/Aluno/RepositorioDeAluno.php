<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Shared\Dominio\CPF;

interface RepositorioDeAluno
{
  public function adicionar(Aluno $aluno): void;
  public function buscarPorCpf(CPF $cpf): Aluno;
  /** @return Aluno[] */
  public function buscarTodos(): array;
}