<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
use exp\src\test_double\GameServer;
use exp\src\test_double\PlayStationService;
use exp\src\test_double\XboxService;

$server = new GameServer();

$ps_service = new PlayStationService();
$xbox_service = new XboxService();

$server->addService($ps_service);
$server->addService($xbox_service);

var_dump( $server->getGameList() );