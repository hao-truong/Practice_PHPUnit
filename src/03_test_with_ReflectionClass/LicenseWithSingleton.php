<?php
declare(strict_types=1);

namespace exp\src\TestReflectionClass;

class LicenseTesterWithSingleton
{
    public function __construct()
    {
    }

    public function isOpenForApplyingLicense( $date ): string {
        $license_service = LicenseService::getInstance();

        if (!$license_service->isOpenForApplyingLicense($date)) {
            return 'Sorry, service is unavailable!';
        }

        return "Ready for applying.";
    }
}
