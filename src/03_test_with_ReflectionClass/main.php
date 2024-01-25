<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../vendor/autoload.php');

use exp\src\TestReflectionClass\LicenseTesterWithSingleton;
use exp\src\TestReflectionClass\LicenseWithPrivateMethods;

// LicenseWithPrivateMethods
$private_license_checker = new LicenseWithPrivateMethods();
var_dump($private_license_checker->applyForLicense(7, 'John'));
var_dump($private_license_checker->applyForLicense(4, 'Anna'));

// LicenseWithSingleton
$licence_tester_with_singleton = new LicenseTesterWithSingleton();
$weekday = '2020-04-22';
$weekend = '2020-04-26';
var_dump("On $weekday (Wednesday), status is: " . $licence_tester_with_singleton->isOpenForApplyingLicense($weekday));
var_dump("On $weekend (Sunday), status is: " . $licence_tester_with_singleton->isOpenForApplyingLicense($weekend));
