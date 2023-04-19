<?php

namespace PHP\Architecture\Academico\Dominio;

interface Evento
{
  public function momento(): \DateTimeImmutable;
}