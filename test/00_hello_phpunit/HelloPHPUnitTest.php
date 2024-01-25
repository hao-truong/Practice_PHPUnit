<?php
declare(strict_types=1);

require_once(__DIR__ . "/../../src/my_autoload.php");

use PHPUnit\Framework\TestCase;
use exp\src\hello_phpunit\HelloPHPUnit;

class HelloPHPUnitTest extends TestCase
{
    private $hello;

    protected function setUp(): void {
        $this->hello = new HelloPHPUnit();
    }

    public function testCanSayHelloWorld() {
        $this->assertSame("Hello world! I'm PHPUnit.", $this->hello->sayHello());
    }

    public function testCanSayHelloName() {
        $name = "Tai Vu";
        $this->assertEquals("Hello $name! I'm PHPUnit.", $this->hello->sayHello($name));
    }
}
