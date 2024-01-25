<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use exp\src\test_double\GameStudio;

$studio = new GameStudio();
var_dump( $studio->produceNewGame() );
