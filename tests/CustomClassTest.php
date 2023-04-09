<?php

namespace Tests;

use CustomProject\CustomClass;
use PHPUnit\Framework\TestCase;

require __DIR__ . '/../vendor/autoload.php';

class CustomClassTest extends TestCase
{
    public function testExample()
    {
        $custom_var = new CustomClass();
        $this->assertTrue(false);
    }
}
