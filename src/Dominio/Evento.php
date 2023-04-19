<?php

namespace PHP\Architecture\Dominio;

interface Evento
{
  public function momento(): \DateTimeImmutable;
}