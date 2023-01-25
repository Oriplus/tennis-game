<?php


use PHPUnit\Framework\TestCase;
use Api\V1\Entities\HistoryDto;
use Api\V1\Domain\Game\FemaleGame;

class FemaleGameTest extends TestCase
{
    /**
     * Test playTournament method
     *
     * @return void
     */
    public function test_playTournament()
    {
        $players = [
          [
            'name' => 'Mary Thompson',
            'ability' => 50,
            'reaction' => 2
          ],
          [
            'name' => 'July Brown',
            'ability' => 20,
            'reaction' => 7
          ]
        ];
        $result = (new FemaleGame())->playTournament($players);
        $this->assertInstanceOf(HistoryDto::class, $result);
    }
}
