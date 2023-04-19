<?php

namespace PHP\Architecture\Academico\Infra\Aluno;

use PHP\Architecture\Academico\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaPhp implements CifradorDeSenha
{
    public function cifrar(string $senha): string {
      return password_hash($senha, PASSWORD_ARGON2ID);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): string {
      return password_verify($senhaEmTexto, $senhaCifrada);
    }
}