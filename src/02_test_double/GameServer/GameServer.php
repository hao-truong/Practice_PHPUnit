<?php
declare(strict_types=1);

namespace exp\src\test_double;

class GameServer
{
    private $services;

    public function __construct()
    {
        $this->services = [];
    }

    public function addService( $service ) {
        $this->services[] = $service;
    }

    public function getGameList() {
        $games = [];
        foreach( $this->services as $service ) {
            $games = array_merge($games, $service->getGameList());
        }

        return $games;
    }

    public function clearAllServices() {
        $this->services = [];
    }
}