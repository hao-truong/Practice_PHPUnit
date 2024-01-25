<?php

declare(strict_types=1);

require_once(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\MonicaStudio;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MonicaStudioTest extends TestCase
{
    private MonicaStudio $monicaStudio;

    protected function setUp(): void
    {
        $this->monicaStudio = new MonicaStudio();
    }

    protected function tearDown(): void
    {
        unset($this->monicaStudio);
    }

    public static function additionProvider(): array
    {
        return [
            [SUMMER_SEASON, []],
            [FALL_SEASON, []],
            [
                WINTER_SEASON,
                [
                    'Game X in MonicaStudio',
                    'Game Y in MonicaStudio'
                ]
            ],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testGetSaleGamesReturnCorrectData(int $season, $expected)
    {
        //TODO: Test function getSaleGames() will return correct data
        //Require: Use data provider
        $this->assertSame($expected, $this->monicaStudio->getSaleGames($season));
    }

    public function testGetStudioName()
    {
        //TODO: Test function getStudioName()
        $expected = 'Santa Monica Studio';
        $this->assertSame($expected, $this->monicaStudio->getStudioName());
    }
}
