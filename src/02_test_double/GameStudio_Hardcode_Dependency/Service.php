<?php
declare(strict_types=1);

namespace exp\src\test_double;

class DeveloperService
{
    public function __construct() {}

    public function devTheGame() {
        return 'This is the code of the game.';
    }
}

class DesignerService
{
    public function __construct() {}

    public function designTheGame() {
        return 'This is the design of the game.';
    }
}
