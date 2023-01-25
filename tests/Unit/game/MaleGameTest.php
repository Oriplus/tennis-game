<?php


use PHPUnit\Framework\TestCase;
use Api\V1\Entities\HistoryDto;
use Api\V1\Domain\Game\MaleGame;

class MaleGameTest extends TestCase
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
            'name' => 'Jhon Doe',
            'ability' => 50,
            'strength' => 4,
            'velocity' => 1
          ],
          [
            'name' => 'Martin Brown',
            'ability' => 20,
            'strength' => 1,
            'velocity' => 8
          ]
        ];
        $result = (new MaleGame())->playTournament($players);
        $this->assertInstanceOf(HistoryDto::class, $result);
    }
}
