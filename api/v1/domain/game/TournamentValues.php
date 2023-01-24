<?php
declare(strict_types=1);

namespace Api\V1\Domain\Game;

class TournamentValues
{

  /*Tournaments Strategies*/
  const TOURNAMENTS = [
    1 => MaleGame::class,
    2 => FemaleGame::class,
  ];
}