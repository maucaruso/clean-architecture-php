<?php

namespace PHP\Architecture\Infra\Aluno;

use PHP\Architecture\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaPhp implements CifradorDeSenha
{
    public function cifrar(string $senha): string {
      return password_hash($senha, PASSWORD_ARGON2ID);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): string {
      return password_verify($senhaEmTexto, $senhaCifrada);
    }
}