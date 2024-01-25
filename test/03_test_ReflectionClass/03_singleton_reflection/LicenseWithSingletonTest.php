<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../../vendor/autoload.php');

use exp\src\TestReflectionClass\LicenseService;
use PHPUnit\Framework\TestCase;
use exp\src\TestReflectionClass\LicenseTesterWithSingleton;

/**
 * In this test, we just focus on the process of function isOpenForApplyingLicense()
 * We don't care about NationalLicenseService, so we will try to fake it
 */

class LicenseWithSingletonTest extends TestCase
{
    public function provideDateData() {
        return [
            ['2020-04-21', 'Ready for applying.'],
            ['2020-04-19', 'Sorry, service is unavailable!']
        ];
    }

    /**
     * @dataProvider provideDateData
     */
    public function testIsOpenForApplyingLicense_NotFakeService($date, $expected_result) {
        $license_tester = new LicenseTesterWithSingleton();

        $this->assertEquals($expected_result, $license_tester->isOpenForApplyingLicense($date));
    }

    /**
     * In this test case, we will fake NationalLicenseService so that will always return FALSE
     */
    public function testIsOpenForApplyingLicenseWhenServiceIsClose() {
        $license_tester = new LicenseTesterWithSingleton();

        $weekday = '2020-04-21';
        $weekend = '2020-04-19';
        $expected_result = 'Sorry, service is unavailable!';

        $this->fakeLicenseServiceReturnData(false);

        $this->assertEquals($expected_result, $license_tester->isOpenForApplyingLicense($weekday));
        $this->assertEquals($expected_result, $license_tester->isOpenForApplyingLicense($weekend));
    }

    /**
     * In this test case, we will fake NationalLicenseService so that will always return TRUE
     */
    public function testIsOpenForApplyingLicenseWhenServiceIsOpen() {
        $license_tester = new LicenseTesterWithSingleton();

        $weekday = '2020-04-21';
        $weekend = '2020-04-19';
        $expected_result = 'Ready for applying.';

        $this->fakeLicenseServiceReturnData(true);

        $this->assertEquals($expected_result, $license_tester->isOpenForApplyingLicense($weekday));
        $this->assertEquals($expected_result, $license_tester->isOpenForApplyingLicense($weekend));
    }

    private function fakeLicenseServiceReturnData( $is_open ) {
        $service_stub = $this->getMockBuilder(LicenseService::class)->getMock();
        $service_stub->method('isOpenForApplyingLicense')
                     ->willReturn($is_open);

        $service_reflection = new ReflectionClass(LicenseService::class);

        try {
            $property_instance = $service_reflection->getProperty('instance');
            $property_instance->setAccessible(true);
            $property_instance->setValue(LicenseService::getInstance(), $service_stub);
        }
        catch (ReflectionException $exception) {}
    }
}
