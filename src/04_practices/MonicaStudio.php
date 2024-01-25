<?php
declare(strict_types=1);

namespace exp\src\practice;

require_once ('Constant.php');

class MonicaStudio
{
    private $sale_season;

    public function __construct()
    {
        $this->sale_season = WINTER_SEASON;
    }

    public function getSaleGames(int $season) {
        if ($this->sale_season != $season) {
            return [];
        }

        return [
            'Game X in MonicaStudio',
            'Game Y in MonicaStudio'
        ];
    }

    public function getStudioName() {
        return 'Santa Monica Studio';
    }
}
