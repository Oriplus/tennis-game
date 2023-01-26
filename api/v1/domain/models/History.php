<?php
declare(strict_types=1);

namespace Api\V1\Domain\Models;

use Api\V1\Dao\HistoryDao;

class History
{
  public function getHistoryByType(int $tournamentId, string $fromDate, string $toDate): array
  {
    $tournamentId = filter_var($tournamentId, FILTER_VALIDATE_INT);
    $fromDate = htmlspecialchars(trim($fromDate));
    $fromDate = htmlspecialchars(trim($toDate));
    $data = (new HistoryDao)->getHistoryByType($tournamentId, $fromDate, $toDate);
    if(empty($data)){
      return  [
        "code" => 200,
        "data" => "",
        "msg" => "Empty Records"
      ];
    }
    return  [
      "code" => 200,
      "data" => json_encode($data),
      "msg" => "History"
    ];
  }
}