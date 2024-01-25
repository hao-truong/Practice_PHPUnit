<?php
declare(strict_types=1);

namespace exp\src\practice;

class GameStudioService
{
    protected $studio_list;

    public function __construct()
    {
        $this->studio_list = [];
        $this->studio_list[] = new PixelStudio();
        $this->studio_list[] = new MonicaStudio();
    }

    public function getSaleGames(int $season)
    {
        $sale_games = [];

        foreach ($this->studio_list as $studio) {
            $sale_games = array_merge ($sale_games, $studio->getSaleGames($season));
        }

        return $sale_games;
    }

    public function notifyNewCampaign() {
        $this->updateStudioList();

        // send notify to all studios
        //...
    }

    public function updateStudioList() {
        /*
         * We will do something like this:
         *
         * $new_studio_list = OutsideService::collect_info_studio_list_outside();
         * $this->studio_list = $new_studio_list
         */

        throw new \ErrorException('FAKE ERROR: Update Studio List');
    }
}
