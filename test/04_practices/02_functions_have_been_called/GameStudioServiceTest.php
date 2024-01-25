<?php

declare(strict_types=1);

require_once(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\GameStudioService;
use exp\src\practice\MonicaStudio;
use exp\src\practice\PixelStudio;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;


class GameStudioServiceTest extends TestCase
{
    private $monica_studio_mock;
    private $pixel_studio_mock;
    private GameStudioService $game_studio_service;

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    protected function setUp(): void
    {
        $this->monica_studio_mock = $this->createMock(MonicaStudio::class);
        $this->pixel_studio_mock = $this->createMock(PixelStudio::class);
        $this->game_studio_service = new GameStudioService();
        $game_studio_service_reflection = new ReflectionClass(GameStudioService::class);
        $studio_list_property = $game_studio_service_reflection->getProperty('studio_list');
        $studio_list_property->setAccessible(true);
        $studio_list_property->setValue(
            $this->game_studio_service,
            [$this->pixel_studio_mock, $this->monica_studio_mock]
        );
    }

    protected function tearDown(): void
    {
        unset($this->monica_studio_mock);
        unset($this->pixel_studio_mock);
        unset($this->game_studio_service);
    }

    public function testGetSaleGamesWillCallToStudioListWithCorrectParameters()
    {
        //TODO: Test function getSaleGames() will call to studios with correct parameter

        //HINT: fake $studio_list
        $season = 2;
        $this->monica_studio_mock->expects($this->once())
                                 ->method('getSaleGames')
                                 ->with($season)
                                 ->willReturn([])
        ;
        $this->pixel_studio_mock->expects($this->once())
                                ->method('getSaleGames')
                                ->with($season)
                                ->willReturn([])
        ;
        $this->game_studio_service->getSaleGames($season);
    }

    public static function getSaleGamesWillReturnCorrectDataDataProvider(): array
    {
        return [
            [
                SPRING_SEASON,
                [
                    'Game X in MonicaStudio',
                    'Game Y in MonicaStudio'
                ],
                []
            ],
            [
                SUMMER_SEASON,
                [
                    'Game X in MonicaStudio',
                    'Game Y in MonicaStudio'
                ],
                [
                    'Game A in PixelStudio',
                    'Game B in PixelStudio'
                ]
            ],
            [
                WINTER_SEASON,
                [],
                [
                    'Game A in PixelStudio',
                    'Game B in PixelStudio'
                ]
            ],
        ];
    }

    #[DataProvider("getSaleGamesWillReturnCorrectDataDataProvider")]
    public function testGetSaleGamesWillReturnCorrectData(int $season, array $monica, array $pixel)
    {
        //TODO: Test function getSaleGames() will return data that returned from studios

        //HINT: fake $studio_list returned data & check it
        $this->monica_studio_mock->expects($this->once())
                                 ->method('getSaleGames')
                                 ->with($season)
                                 ->willReturn($monica)
        ;
        $this->pixel_studio_mock->expects($this->once())
                                ->method('getSaleGames')
                                ->with($season)
                                ->willReturn($pixel)
        ;
        $this->assertSame(array_merge($pixel, $monica), $this->game_studio_service->getSaleGames($season));
    }

    public function testNotifyNewCampaignWillUpdateStudioList()
    {
        //TODO: Test function notifyNewCampaign() will call to function updateStudioList()
        $game_studio_service_mock = $this->getMockBuilder(GameStudioService::class)
                                         ->onlyMethods(['updateStudioList'])
                                         ->getMock()
        ;

        $game_studio_service_mock->expects($this->once())
                                 ->method('updateStudioList')
        ;
        $game_studio_service_mock->notifyNewCampaign();
    }

    public function testUpdateStudioListWillThrowError()
    {
        //TODO: Test function updateStudioList() will throw error as default
        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage('FAKE ERROR: Update Studio List');
        $this->game_studio_service->updateStudioList();
    }
}
