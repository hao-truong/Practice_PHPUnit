<?php
declare(strict_types=1);

namespace exp\src\practice;

require_once ('Constant.php');

class PixelStudio
{
    private $sale_season;

    public function __construct()
    {
        $this->sale_season = SPRING_SEASON;
    }

    public function getSaleGames(int $season) {
        if ($this->sale_season != $season) {
            return [];
        }

        return [
            'Game A in PixelStudio',
            'Game B in PixelStudio'
        ];
    }

    public function getStudioName() {
        $classname_with_namespace = explode('\\', get_class($this));
        return end($classname_with_namespace);
    }
}
