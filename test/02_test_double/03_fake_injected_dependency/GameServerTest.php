<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use exp\src\test_double\GameServer;
use exp\src\test_double\PlayStationService;
use exp\src\test_double\XboxService;

class GameServerTest extends TestCase
{
    public function testGetGameListWithRealServices() {
        $server = new GameServer();

        $ps_service = new PlayStationService();
        $xbox_service = new XboxService();

        $server->addService($ps_service);
        $server->addService($xbox_service);

        $expected_games = [
            'The last of us',
            'God of war',
            'Halo',
            'Diablo 3'
        ];

        $this->assertSame($expected_games, $server->getGameList());
    }

    public function testGetDataWithFakeGameServices() {
        $expected_games = ['Uncharted', 'Horizon Zero Dawn'];

        // Fake service will return fake data
        $ps_service_mock = $this->getMockBuilder(PlayStationService::class)
                                ->getMock();

        // Config the stub object's returned values
        $ps_service_mock->method('getGameList')
                        ->will($this->returnValue($expected_games));

        $server = new GameServer();
        $server->addService($ps_service_mock);

        $this->assertSame($expected_games, $server->getGameList());
    }

    public function testServicesHaveBeenCalled() {
        // Fake service will return fake data
        $ps_service_mock = $this->getMockBuilder(PlayStationService::class)
                                ->getMock();

        // Config the stub object's returned values
        // $this->once() is equal to $this->exactly(1)
        $ps_service_mock->expects($this->once())
                        ->method('getGameList')
                        ->will($this->returnValue([]));

        $server = new GameServer();
        $server->addService($ps_service_mock);

        $server->getGameList();
    }

    public function testServicesHaveNotBeenCalled() {
        // Fake service will return fake data
        $ps_service_mock = $this->getMockBuilder(PlayStationService::class)
                                ->getMock();

        // Config the stub object's returned values
        // $this->once() is equal to $this->exactly(1)
        $ps_service_mock->expects($this->never())
                        ->method('getGameList')
                        ->will($this->returnValue([]));

        $server = new GameServer();
        $server->addService($ps_service_mock);
        $server->clearAllServices();

        $server->getGameList();
    }
}