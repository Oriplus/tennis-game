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
        $fromDate = $queryString['fromDate'] ?? null;
        $toDate = $queryString['toDate'] ?? null;
      }
      $response = (new History)->getHistoryByType($tournamentId, $fromDate, $toDate);
      Response::ApiResponse(200, 'History', json_encode($response));
    } catch (\Throwable $th) {
      Response::ApiResponse(500, $th->getMessage());
    }
  }
}