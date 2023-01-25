<?php
declare(strict_types=1);

namespace Api\V1\Domain\Models;

use Api\V1\Dao\HistoryDao;
use Api\V1\Domain\Game\TournamentValues;

class Game
{
  public function play(int $tournamentId, array $players): array
  {
    if((count($players) % 2) != 0 || empty($players)){
      return  [
        "code" => 422,
        "data" => "",
        "data" => "Error: Players must be odd number"
      ];
    }
    if(!isset(TournamentValues::TOURNAMENTS[$tournamentId])){
      return  [
        "code" => 404,
        "data" => "",
        "msg" => "Error: Tournament not found"
      ];
    }
    $tournamentId = filter_var($tournamentId, FILTER_VALIDATE_INT);
    $tournament = TournamentValues::TOURNAMENTS[$tournamentId];
    $historyDto = (new $tournament)->playTournament($players);
    (new HistoryDao)->createHistory($historyDto);
    return  [
      "code" => 200,
      "data" => $historyDto->winner,
      "msg" => "Tournament Finished"
    ];
  }
}