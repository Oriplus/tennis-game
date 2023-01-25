<?php
declare(strict_types=1);

namespace Api\V1\Entities;

class HistoryDto implements \JsonSerializable
{

  public function __construct(
    private string $winner,
    private int $roundQty,
    private string $date,
    private int $tournamentId
  )
  {
    $this->winner = $winner;
    $this->roundQty = $roundQty;
    $this->date = $date;
    $this->tournamentId = $tournamentId;
  }

  public function __get($name)
  {
      if (!property_exists(get_class($this), $name)) {
          throw new \Exception("Property not found.");
      }
      return $this->$name;
  }

  public function jsonSerialize(): array
  {
    return [
      'winner' => $this->winner,
      'roundQty' => $this->roundQty,
      'date' => $this->date
    ];
  }
}

