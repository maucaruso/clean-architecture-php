<?php

namespace PHP\Architecture\Shared\Dominio\Evento;

class PublicadorDeEvento
{
  private array $ouvintes = [];
  
  public function adicionarOuvinte(OuvinteDeEvento $ouvinte): void
  {
    $this->ouvintes[] = $ouvinte;
  }
  
  public function publicar(Evento $evento): void
  {
    foreach ($this->ouvintes as $ouvinte) {
      $ouvinte->processa($evento);
    }
  }
}