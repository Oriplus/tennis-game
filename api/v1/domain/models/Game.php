<?php
declare(strict_types=1);

namespace Api\V1\Domain\Models;

use Api\V1\Dao\HistoryDao;
use Api\V1\Domain\Game\TournamentValues;

class Game
{
  public function play(int $tournamentId, array $players): string
  {
    $tournamentId = filter_var($tournamentId, FILTER_VALIDATE_INT);
    array_walk_recursive($players, 'htmlspecialchars');
    if((count($players) % 2) != 0 || empty($players)){
      throw new \Throwable("Players must be odd number", 1);
    }
    $tournament = TournamentValues::TOURNAMENTS[$tournamentId];
    $historyDto = (new $tournament)->playTournament($players);
    (new HistoryDao)->createHistory($historyDto);
    return $historyDto->winner;
  }
}