<?php
declare(strict_types=1);

namespace Api\V1\Presentation\Controllers;

use Api\V1\Domain\Models\Game;
use General\Response;

class GameController
{
  /** Process player data an store winner
   * @param int $tournamentId
   */
  public function create(int $tournamentId): void
  {
    try {
      $playersData = file_get_contents('php://input', true);
      $playersData = json_decode($playersData, true, 512, JSON_THROW_ON_ERROR);
      $response = (new Game)->play($tournamentId, $playersData);
      Response::ApiResponse($response['code'], $response['msg'], $response['data']);
    } catch (\Throwable $th) {
      Response::ApiResponse(500, $th->getMessage());
    }
  }
}