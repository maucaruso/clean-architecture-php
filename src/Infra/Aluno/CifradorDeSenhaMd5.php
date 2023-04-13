<?php

namespace PHP\Architecture\Infra\Aluno;

use PHP\Architecture\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaMd5 implements CifradorDeSenha
{
    public function cifrar(string $senha): string
    {
      return md5($senha);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): string
    {
      return md5($senhaEmTexto) === $senhaCifrada;
    }
}