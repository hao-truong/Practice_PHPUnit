<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use PHPUnit\Framework\TestCase;
use exp\src\TestReflectionClass\LicenseWithPrivateMethods;

class LicensePrivateTest extends TestCase
{
    public function provideLicenseCardData() {
        return [
            ['John Wick', 'John Wick has a valid license.'],
            ['Lukaku', 'Lukaku has a valid license.'],
            ['Ozil', 'Ozil has a valid license.']
        ];
    }

    /**
     * @dataProvider provideLicenseCardData
     */
    public function testBuildLicenseCard($name, $expected_license) {
        $license_checker = new LicenseWithPrivateMethods();

        $license_reflection = new ReflectionClass(LicenseWithPrivateMethods::class);
        $build_license_method = $license_reflection->getMethod('buildLicenseCard');
        $build_license_method->setAccessible(true);

        $this->assertEquals($expected_license, $build_license_method->invokeArgs($license_checker, [$name]));
    }
}
