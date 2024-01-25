<?php
declare(strict_types=1);

namespace exp\src\TestReflectionClass;

class LicenseService
{
    private static $instance;

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function isOpenForApplyingLicense( $date ) {
        /**
         * This function can be used in case:
         *   - On weekdays: The office is open, so this function return true
         *   - On weekend: The office is close, so this function return false
         */

        // This simple logic checks $day if it is in holiday / weekends / ...
        if( $this->isWeekend($date)) {
            return false;
        }

        return true;
    }

    private function isWeekend($date) {
        return (date('N', strtotime($date)) >= 6);
    }
}
