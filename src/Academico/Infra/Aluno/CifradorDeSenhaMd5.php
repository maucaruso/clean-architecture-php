<?php

namespace PHP\Architecture\Academico\Infra\Aluno;

use PHP\Architecture\Academico\Dominio\Aluno\CifradorDeSenha;

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