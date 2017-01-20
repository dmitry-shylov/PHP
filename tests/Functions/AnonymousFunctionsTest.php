<?php

namespace tests\Functions;

use PHPUnit_Framework_TestCase;

class AnonymousFunctionsTest extends PHPUnit_Framework_TestCase
{
    public function test1()
    {
        /*
         * Будет возвращатся то значение переменной, которая обьявленна до обьявление функции,
         * даже если эта переменная переприсваивается и заново вызывается функция
        */

        $inputValue = 'world';
        $example = function () use ($inputValue) {
            return $inputValue;
        };

        $inputValue = 'hello';
        $this->assertEquals('world', $example());
        $this->assertNotEquals('hello', $example());
    }

    public function test2()
    {
        /*
         * Если использовать ссылку,
         * то при переприсвоении переменной другого значения функция будет вызываться уже с новым значением
         */

        $inputValue = 'hello';
        $example = function () use (&$inputValue) {
            return $inputValue;
        };

        $inputValue = '123';
        $this->assertEquals('123', $example());
    }

    public function test3()
    {
        /*
         * Пример анонимной функции с аргументами
         */

        $c = 2;
        $example = function ($a, $b) use ($c) {
            return $a * $b * $c;
        };

        $this->assertEquals(8, $example(2,2));
    }

    public function test4()
    {
        /*
         * Изменение значения переменной внутри функции при передаче по ссылке
         */

        $inputValue = 2;
        $example = function () use (&$inputValue) {
            $inputValue += 2;
        };

        $example();
        $this->assertEquals(4, $inputValue);

        $inputValue = 2;
        $example = function () use (&$inputValue) {
            $a = &$inputValue;
            $a++;
        };

        $example();
        $this->assertEquals(3, $inputValue);
    }
}