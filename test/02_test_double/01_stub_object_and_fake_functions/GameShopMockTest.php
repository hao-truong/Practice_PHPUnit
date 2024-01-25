<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use exp\src\test_double\GameShop;

class GameShopMockTest extends TestCase
{
    public function testIfAllStubFunctionsReturnNull() {
        // Create the stub object
        $shop_mock = $this->getMockBuilder(GameShop::class)
                          ->getMock();

        $this->assertSame(null, $shop_mock->sellGame('some_game'));
        $this->assertSame(null, $shop_mock->logTransaction('some_game'));
        $this->assertSame(null, $shop_mock->getSaleNumber());
    }

    public function testIfWeCanFakeGetSaleNumber() {
        // Create the stub object
        $shop_mock = $this->getMockBuilder(GameShop::class)
                          ->getMock();

        // Config the stub object's returned values
        $shop_mock->expects($this->once())
                  ->method('getSaleNumber')
                  ->willReturn(5);

        $this->assertSame(5, $shop_mock->getSaleNumber());
    }

    public function testFakeGetSaleNumberReturnDifferentValues() {
        // Create the stub object
        $shop_mock = $this->getMockBuilder(GameShop::class)
                          ->getMock();

        // Config the stub object's returned values
        $shop_mock->expects($this->at(0))
                  ->method('getSaleNumber')
                  ->willReturn(5);
        $shop_mock->expects($this->at(1))
                  ->method('getSaleNumber')
                  ->will($this->returnValue(10));

        $this->assertSame(5, $shop_mock->getSaleNumber());
        $this->assertSame(10, $shop_mock->getSaleNumber());
    }

    public function testFakeGetSaleNumberReturnDifferentValues_OtherWay() {
        // Create the stub object
        $shop_mock = $this->getMockBuilder(GameShop::class)
                          ->getMock();

        // Config the stub object's returned values
        $shop_mock->method('getSaleNumber')
                  ->will($this->onConsecutiveCalls(5, 10, 15));


        $this->assertSame(5, $shop_mock->getSaleNumber());
        $this->assertSame(10, $shop_mock->getSaleNumber());
        $this->assertSame(15, $shop_mock->getSaleNumber());
    }
}
