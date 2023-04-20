<?php

namespace PHP\Architecture\Shared\Dominio\Evento;

interface Evento extends \JsonSerializable
{
  public function momento(): \DateTimeImmutable;
  public function nome(): string;
}