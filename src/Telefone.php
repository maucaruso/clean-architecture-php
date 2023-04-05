<?php

namespace PHP\Architecture;

class Telefone
{
  private string $ddd;
  private string $numero;
  
  public function __construct(string $ddd, string $numero)
  {
    $this->ddd = $ddd;
    $this->numero = $numero;
    
    // criar setddd e setnumero, garantir que dd tenha somente 2 numeros e que o numero seja numerico e tenha apenas 8 caracteres
  }
}