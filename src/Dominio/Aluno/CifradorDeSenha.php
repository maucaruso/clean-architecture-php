<?php

namespace PHP\Architecture\Dominio\Aluno;

interface CifradorDeSenha
{
  public function cifrar(string $senha): string;
  public function verificar(string $senhaEmTexto, string $senhaCifrada): string;
}
