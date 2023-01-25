<?php
declare(strict_types=1);

namespace Api\V1\Dao;

use Api\V1\Entities\HistoryDto;
use PDO;

class HistoryDao extends Database
{

  /** Create history record
   * @param HistoryDto $historyDto
   * @return void
   */
  public function createHistory(HistoryDto $historyDto): void
  {
    try {
      $query = "INSERT INTO history (winner, round_qty, created_at, tournament_id) VALUES (:winner, :roundQty, :date, :tournamentId)";
      $stmt = $this->connection->prepare($query);
      $stmt->bindValue('winner', $historyDto->winner);
      $stmt->bindValue('roundQty', $historyDto->roundQty);
      $stmt->bindValue('date', $historyDto->date);
      $stmt->bindValue('tournamentId', $historyDto->tournamentId);
      $stmt->execute();
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  /** get history records
   * @param int $tournamentId
   * @param ?string $fromDate
   * @param ?string $toDate
   * @return array
   */
  public function getHistoryByType(int $tournamentId, ?string $fromDate, ?string $toDate): array
  {
    try {
      $where = '';
      $select = "SELECT winner, created_at, tournament_id, round_qty FROM history WHERE tournament_id = :tournamentId ";
      if(!empty($fromDate) && !empty($toDate)) {
        $where = "AND created_at BETWEEN :fromDate ' 00:00:00' AND :toDate ' 23:59:59';";
      }
      $query = $select . $where;
      $stmt = $this->connection->prepare($query);
      if(!empty($where)) {
        $stmt->bindValue('fromDate', $fromDate);
        $stmt->bindValue('toDate', $toDate);
      }
      $stmt->bindValue('tournamentId', $tournamentId);
      $stmt->execute();
      $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
      $historyList = [];
      foreach ($result as  $value) {
        $historyList[] = new HistoryDto(
          $value->winner,
          (int) $value->round_qty,
          $value->created_at,
          (int)$value->tournament_id
        );
      }
      return $historyList;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}