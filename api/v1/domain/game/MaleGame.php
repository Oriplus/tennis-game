<?php

declare(strict_types=1);

namespace Api\V1\Domain\Game;

use Api\V1\Domain\Game\Interfaces\TennisGameInterface;
use Api\V1\Entities\HistoryDto;

class MaleGame implements TennisGameInterface
{

  /** Start game
   * @param array $players
   * @return HistoryDto
   */
  public function playTournament(array $players): HistoryDto
  {
    $round = $totalPlayers = $totalRounds = 0;
    $totalPlayers = count($players);
    $totalRounds = (int) log($totalPlayers, 2);
    while ($round < $totalRounds) {
      $players = $this->getRoundResults($players);
      $round++;
    }
    return new HistoryDto(
      htmlspecialchars(trim($players[0]['name'])),
      $totalRounds,
      (new \DateTime())->format('Y-m-d H:i:s'),
      1
    );
  }

  /** Lucky values
   * @return int
  */
  private function getLucky(): int
  {
    return rand(-50, 50);
  }

  /** Get a winner per round
   * @param array $players
   * @return array
   */
  private function getRoundResults(array $players): array
  {
    $pointsPlayer1 = $pointsPlayer2 = 0;
    $totalPlayers = count($players) / 2;
     for ($i = 0; $i <= $totalPlayers; $i+= 2) {
      $pointsPlayer1 = $players[$i]['ability'] + $players[$i]['strength'] + $players[$i]['velocity'] + $this->getLucky();
      $pointsPlayer2 = $players[$i + 1]['ability'] + $players[$i + 1]['strength'] + $players[$i + 1]['velocity'] + $this->getLucky();
      if($pointsPlayer1 == $pointsPlayer2) {
        //INFO: there is a tie, a winner is chosen randomly
        $key = array_rand([$i, $i + 1], 1);
        unset($players[$key]);
      } else if($pointsPlayer1 > $pointsPlayer2) {
        unset($players[$i + 1]);
      } else {
        unset($players[$i]);
      }
    }
    $players = array_values($players);
    return $players;
  }
}
