<?php
declare(strict_types=1);

namespace Api\V1\Domain\Models;

use Api\V1\Dao\HistoryDao;

class History
{
  public function getHistoryByType(int $tournamentId, ?string $fromDate, ?string $toDate): array
  {
    $tournamentId = filter_var($tournamentId, FILTER_VALIDATE_INT);
    $fromDate = htmlspecialchars(trim($fromDate));
    $fromDate = htmlspecialchars(trim($toDate));
    return (new HistoryDao)->getHistoryByType($tournamentId, $fromDate, $toDate);
  }
}