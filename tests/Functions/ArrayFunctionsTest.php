<?php

namespace tests\Functions;

use PHPUnit_Framework_TestCase;

class ArrayFunctionsTest extends PHPUnit_Framework_TestCase
{
    public function testArrayDiff()
    {
        $firstArray = [31, 32, 33, 34, 35, 36];
        $secondArray = [31, 38];
        $result = array_diff($firstArray, $secondArray);

        $this->assertEquals([1 => 32, 2 => 33, 3 => 34, 4 => 35, 5 => 36], $result);
        $this->assertNotEquals([32, 33, 34, 35, 36], $result);
    }
}