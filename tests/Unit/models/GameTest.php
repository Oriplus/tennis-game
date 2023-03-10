<?php


use PHPUnit\Framework\TestCase;
use Api\V1\Domain\Models\Game;

class GameTest extends TestCase
{
    /**
     * Test getHistoryByType method
     *
     * @return void
     */
    public function test_play()
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
          $response = [
            "code" => 200,
            "data" => 'Mary Thompson'
          ];
        $mockGame = $this->createMock(Game::class);
        $mockGame->method('play')
                    ->willReturn($response);
        $result = $mockGame->play(1, $players);
        $this->assertEquals('Mary Thompson', $result['data']);
    }
}
