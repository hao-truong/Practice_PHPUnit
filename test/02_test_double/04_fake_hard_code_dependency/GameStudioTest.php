<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use exp\src\test_double\GameStudio;

class GameStudioTest extends TestCase
{
    public function testCanProduceNewGame() {
        $studio = new GameStudio();

        $expected_game = [
            'code' => 'This is the code of the game.',
            'design' => 'This is the design of the game.'
        ];

        $this->assertSame($expected_game, $studio->produceNewGame());
    }

    public function testFakeHardCodeDependency() {
        /**
         * Context:
         * We create new instance of GameStudio (e.g $studio = new GameStudio_Hardcode_Dependency();), then we call $studio->produceNewGame()
         * As normal, we receive the the result of function devTheGame() and designTheGame() (in DeveloperService and DesignerService)
         * What if we want to fake these 2 classes to return fake values
         *
         * Can we do that?
         * Answer: WE CAN NOT
         * Reason:
         *  - Our code depends on DeveloperService and DesignerService at class-level.
         *  - We can only use mock/stub in object-level, we CAN NOT redeclare classes.
         * Ref:
         * https://jtreminio.com/blog/unit-testing-tutorial-part-iv-mock-objects-stub-methods-and-dependency-injection/
         * (In section "But why dependency injection?")
         *
         * What should we do?
         * - Use dependency injection: that means our code only have dependencies at object-level
         * - We hold an instance of DeveloperService/DesignerService in a property of the class
         *   + We can change that property later by get/set functions.
         *   + We can use ReflectionClass to change the value of an object in runtime
         * - We can use "runkit" to redeclare a class, but it's RISKY
         */

        /**
         * Improvement 1: Keep dependency in a property
         * class GameStudio
         * {
         *     $private $devTeam;
         *
         *     public function __construct() {
         *         $this->devTeam = new DeveloperService();
         *     }
         * }
         */

        $this->assertEquals(true, true);
    }
}
