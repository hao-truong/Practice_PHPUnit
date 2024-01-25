<?php
declare(strict_types=1);

namespace exp\src\practice;

use ErrorException;

require_once ('Constant.php');

class GameStore
{
    private $sale_season;
    private $studio_service;

    /**
     * GameStore constructor.
     * @param int $_sale_season
     */
    public function __construct(int $_sale_season = SPRING_SEASON)
    {
        $this->sale_season = $_sale_season;
        $this->studio_service = new GameStudioService();
    }

    /**
     * @param int $season
     * @return array
     * @throws ErrorException
     */
    public function getSaleList(int $season = 0) {
        if ($this->sale_season !== $season) {
            throw new ErrorException("FAKE ERROR: NOT IN SALE");
        }

        $this->studio_service->updateStudioList();

        return $this->studio_service->getSaleGames($season);
    }
}
