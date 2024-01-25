<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use exp\src\TestReflectionClass\LicenseWithPrivateMethods;

/**
 * In case of Protected functions, we can make a wrapper class and make those functions public
 * We can test public funtions in the wrapper class
 */
class LicenseWrapper extends LicenseWithPrivateMethods
{
    public function isPassTheTest(int $score): bool
    {
        return parent::isPassTheTest($score);
    }
}

class LicenseProtectedTest extends TestCase
{
    public function provideScoreData() {
        return [
            [7, true],
            [3, false],
            [5, false],
            [-1, false]
        ];
    }

    /**
     * @dataProvider provideScoreData
     */
    public function testIsPassTheTest($score, $expected_result) {
        $license_checker = new LicenseWrapper();

        $this->assertEquals($expected_result, $license_checker->isPassTheTest($score));
    }

    public function provideLicenseData() {
        return [
            [7, 'John Wick', 'John Wick has a valid license.'],
            [5, 'Karik', 'Sorry Karik, you need a higher score.'],
            [3, 'Mark', 'Sorry Mark, you need a higher score.']
        ];
    }

    /**
     * @dataProvider provideLicenseData
     */
    public function testApplyForLicense($score, $name, $expected_result) {
        $license_checker = new LicenseWithPrivateMethods();

        $this->assertEquals($expected_result, $license_checker->applyForLicense($score, $name));
    }
}
