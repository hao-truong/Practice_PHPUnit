<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use exp\src\test_double\GameShop;

class GameShopTest extends TestCase
{
    public function testSellGameWillIncreaseSaleNumber() {
        $shop = new GameShop();
        $some_game = 'Uncharted';

        $this->assertSame(1, $shop->sellGame($some_game));
        $this->assertSame(2, $shop->sellGame($some_game));
    }

    public function testLogTransactionHasBeenCalled() {
        // Only methods are in onlyMethods() will be mocked and return NULL by default
        // Other functions still remain.
        $shop_mock = $this->getMockBuilder(GameShop::class)
                          ->onlyMethods(['logTransaction'])
                          ->getMock();

        $shop_mock->expects($this->once())
                  ->method('logTransaction');

        $shop_mock->sellGame('', true);
    }

    public function testLogTransactionHasNotBeenCalled() {
        $shop_mock = $this->getMockBuilder(GameShop::class)
                          ->onlyMethods(['logTransaction'])
                          ->getMock();

        $shop_mock->expects($this->never())
                  ->method('logTransaction');

        $shop_mock->sellGame('', false);
    }
}
