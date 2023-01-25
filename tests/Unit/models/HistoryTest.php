<?php


use PHPUnit\Framework\TestCase;
use Api\V1\Entities\HistoryDto;
use Api\V1\Domain\Models\History;

class HistoryTest extends TestCase
{
    /**
     * Test getHistoryByType method
     *
     * @return void
     */
    public function test_getHistoryByType()
    {
         $mockHistoryArray = [
            new HistoryDto(
                'Jhon Doe',
                2,
                '2023-01-01',
                1
            ),
        ];
        $mockHistory = $this->createMock(History::class);
        $mockHistory->method('getHistoryByType')
                    ->willReturn($mockHistoryArray);
        $result = $mockHistory->getHistoryByType(1, '', '');
        $this->assertInstanceOf(HistoryDto::class, $result[0]);
    }
}
