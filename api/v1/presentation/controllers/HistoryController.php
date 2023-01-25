<?php
declare(strict_types=1);

namespace Api\V1\Presentation\Controllers;

use Api\V1\Domain\Models\History;
use General\Response;

class HistoryController
{
  /** Get history data
   * @param int $tournamentId
   * @param array $queryString
   */
  public function show(int $tournamentId, array $queryString): void
  {
    try {
      if(!empty($queryString))
      {
        $fromDate = $queryString['fromDate'] ?? '';
        $toDate = $queryString['toDate'] ?? '';
      }
      $response = (new History)->getHistoryByType($tournamentId, $fromDate, $toDate);
      Response::ApiResponse($response['code'], $response['msg'], $response['data']);
    } catch (\Throwable $th) {
      Response::ApiResponse(500, $th->getMessage());
    }
  }
}