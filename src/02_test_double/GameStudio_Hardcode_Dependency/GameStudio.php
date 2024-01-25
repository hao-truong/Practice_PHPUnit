<?php
declare(strict_types=1);

namespace exp\src\test_double;

class GameStudio
{
    public function __construct()
    {
    }

    public function produceNewGame() {
        $dev = new DeveloperService();
        $designer = new DesignerService();

        $game = [
            'code' => $dev->devTheGame(),
            'design' => $designer->designTheGame()
        ];

        return $game;
    }
}
