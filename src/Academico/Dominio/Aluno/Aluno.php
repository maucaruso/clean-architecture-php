<?php

namespace PHP\Architecture\Academico\Dominio\Aluno;

use PHP\Architecture\Dominio\{CPF, Email};

class Aluno
{
  private CPF $cpf;
  private string $nome;
  private Email $email;
  private array $telefones;
  
  public function __construct(Cpf $cpf, string $nome, Email $email)
  {
    $this->cpf = $cpf;
    $this->nome = $nome;
    $this->email = $email;
    $this->telefones = [];
  }
  
  public static function comCpfNomeEEmail(string $cpf, string $nome, string $email): self
  {
    return new Aluno(new Cpf($cpf), $nome, new Email($email));
  }
  
  public function adicionarTelefone(string $ddd, string $numero): self
  {
    if (count($this->telefones) === 2) {
      throw new \DomainException("Aluno já tem 2 telefones, não é possível adicionar outro.");
    }
    
    $this->telefones[] = new Telefone($ddd, $numero);
    
    return $this;
  }
  
  public function cpf(): string
  {
    return $this->cpf;
  }
  
  public function nome(): string
  {
    return $this->nome;
  }
  
  public function email(): string
  {
    return $this->email;
  }
  
  /** @return Telefone[] */
  public function telefones(): array
  {
    return $this->telefones;
  }
}