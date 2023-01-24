<?php
declare(strict_types=1);

namespace Api\V1\Domain\Game\Interfaces;

use Api\V1\Entities\HistoryDto;

interface TennisGameInterface
{
  public function playTournament(array $players): HistoryDto;
}