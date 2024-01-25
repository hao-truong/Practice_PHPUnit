<?php
declare(strict_types=1);

namespace exp\src\TestReflectionClass;

class LicenseWithPrivateMethods
{
    public function __construct()
    {
    }

    public function applyForLicense(int $score, string $name): string {
        if ($this->isPassTheTest($score)) {
            return $this->buildLicenseCard($name);
        }

        return "Sorry $name, you need a higher score.";
    }

    private function buildLicenseCard(string $name) {
        return "$name has a valid license.";
    }

    protected function isPassTheTest(int $score): bool {
        if ($score > 5) {
            return true;
        }

        return false;
    }
}
