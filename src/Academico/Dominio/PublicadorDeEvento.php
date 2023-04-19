<?php

namespace PHP\Architecture\Academico\Dominio;

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