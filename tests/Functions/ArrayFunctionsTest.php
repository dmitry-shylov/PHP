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

    public function testArrayChangeKeyCase()
    {
        //Если не массив, то генерируется E_WARNING и возвращается false
        $input_array = '';
        $this->assertEquals(false, array_change_key_case($input_array));

        //Преобразование к верхнему регистру
        $input_array = ['FirSt' => 1, 'SecOnd' => 4];
        $this->assertEquals(['FIRST' => 1, 'SECOND' => 4], array_change_key_case($input_array, CASE_UPPER));

        //Преобразование к нижнему регистру
        $input_array = ['FirSt' => 1, 'SecOnd' => 4];
        $this->assertEquals(['first' => 1, 'second' => 4], array_change_key_case($input_array, CASE_LOWER));

        //Если массив содержит индексы, которые станут одноименными после применения данной функции (например, "keY" и "kEY"),
        //значение последнего одноименного индекса перекроет другие совпадающие значения из этого массива.
        $input_array = ['Key' => 1, 'KeY' => 4];
        $this->assertEquals(['KEY' => 4], array_change_key_case($input_array, CASE_UPPER));

        //Если числовые ключи-просто возвращается массив
        $input_array = [1 => 'Key', 4 => 'KeY'];
        $this->assertEquals([1 => 'Key', 4 => 'KeY'], array_change_key_case($input_array, CASE_UPPER));
    }
}