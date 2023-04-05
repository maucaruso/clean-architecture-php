<?php

namespace PHP\Architecture;

class Aluno
{
  private CPF $cpf;
  private string $nome;
  private Email $email;
  private array $telefones;
  
  public function adicionarTelefone(string $ddd, string $numero)
  {
    $this->telefones[] = new Telefone($ddd, $numero);
  }
}