<?php

declare(strict_types=1);

require_once(__DIR__ . '/../../../vendor/autoload.php');
require_once(__DIR__ . '/../../../src/04_practices/Constant.php');

use exp\src\practice\GameStore;
use exp\src\practice\GameStudioService;
use PHPUnit\Framework\TestCase;

class GameStoreTest extends TestCase
{
    public function testGetSaleListWillThrowErrorWhenNotInSaleSeason()
    {
        //TODO: Test function getSaleList() will throw error if not in Sale season
        $game_store = new GameStore();
        $this->expectException(ErrorException::class);
        $this->expectExceptionMessage("FAKE ERROR: NOT IN SALE");
        $game_store->getSaleList();
    }

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     * @throws ErrorException
     */
    public function testGetSaleListWillCallToServiceDuringSale()
    {
        //TODO: Test function getSaleList() will call to service in case of sale season

        //HINT: You need to:
        // - Fake GameStudioService
        // - Fake private property $studio_service (use reflection class)
        $game_studio_service_mock = $this->createMock(GameStudioService::class);
        $game_store = new GameStore();
        $game_store_reflection = new ReflectionClass(GameStore::class);
        $studio_service_property = $game_store_reflection->getProperty('studio_service');
        $studio_service_property->setAccessible(true);
        $studio_service_property->setValue($game_store, $game_studio_service_mock);

        $game_studio_service_mock->expects($this->once())
                                 ->method('updateStudioList')
        ;

        $game_studio_service_mock->expects($this->once())
                                 ->method('getSaleGames')
        ;

        $game_store->getSaleList(SPRING_SEASON);
    }
}
