<?php
declare(strict_types=1);

namespace exp\src\test_double;

class PlayStationService
{
    public function __construct() {}

    public function getGameList() {
        return [
            'The last of us',
            'God of war'
        ];
    }
}

class XboxService
{
    public function __construct() {}

    public function getGameList() {
        return [
            'Halo',
            'Diablo 3'
        ];
    }
}