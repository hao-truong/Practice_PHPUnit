<?php
declare(strict_types=1);

namespace exp\src\hello_phpunit;

class HelloPHPUnit {
    public function __construct()
    {
    }

    public function sayHello(string $name = '') {
        $_name = 'world';
        if( strlen($name) > 0){
            $_name = $name;
        }
        return "Hello $_name! I'm PHPUnit.";
    }
}
