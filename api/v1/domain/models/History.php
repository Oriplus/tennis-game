<?php
declare(strict_types=1);

namespace Api\V1\Domain\Models;

use Api\V1\Dao\HistoryDao;

class History
{
  public function getHistoryByType(int $tournamentId, ?string $fromDate, ?string $toDate): array
  {
    return (new HistoryDao)->getHistoryByType($tournamentId, $fromDate, $toDate);
  }
}