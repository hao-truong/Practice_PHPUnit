<?php
declare(strict_types=1);

namespace exp\src\tax;

define('REGION_ASIA', 1);
define('REGION_AMERICA', 2);
define('REGION_EUROPE', 3);

class TaxCalculator
{
    private $tax_rate;

    public function __construct(int $region)
    {
        switch ($region) {
            case REGION_ASIA:
                $this->tax_rate = 0.1;
                break;
            case REGION_AMERICA:
                $this->tax_rate = 0.2;
                break;
            case REGION_EUROPE:
                $this->tax_rate = 0.3;
                break;
            default:
                $this->tax_rate = 0.4;
        }
    }

    public function taxCalculate( $price ) {
        return $this->tax_rate * $price;
    }
}
