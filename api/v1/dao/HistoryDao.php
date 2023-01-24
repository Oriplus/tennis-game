<?php
declare(strict_types=1);

namespace Api\V1\Dao;

use Api\V1\Entities\HistoryDto;

class HistoryDao extends Database
{

  public function createHistory(HistoryDto $historyDto): void
  {
    $query = "INSERT INTO history (winner, round_qty, created_at, tournament_type) VALUES (:winner, :roundQty, :date, :tournamentType)";
    $stmt = $this->connection->prepare($query);
    $stmt->bindValue('winner', $historyDto->winner);
    $stmt->bindValue('roundQty', $historyDto->roundQty);
    $stmt->bindValue('date', $historyDto->date);
    $stmt->bindValue('tournamentType', $historyDto->tournamentType);
    $stmt->execute();
  }
}