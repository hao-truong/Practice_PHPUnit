<?php

declare(strict_types=1);

require_once(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\PixelStudio;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class PixelStudioTest extends TestCase
{
    private $pixelStudio;

    protected function setUp(): void
    {
        $this->pixelStudio = new PixelStudio();
    }

    protected function tearDown(): void
    {
        unset($this->pixelStudio);
    }

    public static function additionProvider(): array
    {
        return [
            [
                SPRING_SEASON,
                [
                    'Game A in PixelStudio',
                    'Game B in PixelStudio'
                ]
            ],
            [SUMMER_SEASON, []],
        ];
    }

    #[DataProvider('additionProvider')]
    public function testGetSaleGamesReturnCorrectData(int $season, array $expected)
    {
        //TODO: Test function getSaleGames() will return correct data
        //Require: Use data provider
        $this->assertSame($expected, $this->pixelStudio->getSaleGames($season));
    }

    public function testGetStudioName()
    {
        //TODO: Test function getStudioName()
        $this->assertSame('PixelStudio', $this->pixelStudio->getStudioName());
    }
}
