<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');
use exp\src\test_double\GameShop;

$shop = new GameShop();
var_dump( 'Total sale numbers: ' . $shop->sellGame('Halo') );
var_dump( 'Total sale numbers: ' . $shop->sellGame('God of War') );
var_dump( 'Total sale numbers: ' . $shop->getSaleNumber() );