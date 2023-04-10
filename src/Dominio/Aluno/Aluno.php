<?php

namespace PHP\Architecture\Dominio\Aluno;

use PHP\Architecture\Dominio\{CPF, Email};

class Aluno
{
  private CPF $cpf;
  private string $nome;
  private Email $email;
  private array $telefones;
  
  private function __construct(Cpf $cpf, string $nome, Email $email)
  {
    $this->cpf = $cpf;
    $this->nome = $nome;
    $this->email = $email;
  }
  
  public static function comCpfNomeEEmail(string $cpf, string $nome, string $email): self
  {
    return new Aluno(new Cpf($cpf), $nome, new Email($email));
  }
  
  public function adicionarTelefone(string $ddd, string $numero)
  {
    $this->telefones[] = new Telefone($ddd, $numero);
    return $this;
  }
}

Aluno::comCpfNomeEEmail('123123', '123123', '123123')->adicionarTelefone('123123123', 123123);