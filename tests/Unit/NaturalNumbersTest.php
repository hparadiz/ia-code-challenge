<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\NaturalNumbers;

/**
 * @author Henry Paradiz <henry.paradiz@gmail.com>
 */
class NaturalNumbersTest extends TestCase
{
    private NaturalNumbers $NaturalNumbers;
    public function setUp(): void
    {
        $this->NaturalNumbers = new NaturalNumbers();
    }

    public function test_ExceptionN0()
    {
        $this->expectExceptionMessage('$n must be greater than 0');
        $this->NaturalNumbers->squareOfSumOfOneToN(0);
    }

    public function test_ExceptionN101()
    {
        $this->expectExceptionMessage('Values of $n over 100 are not supported');
        $this->NaturalNumbers->squareOfSumOfOneToN(101);
    }


    public function test_ExceptionN0A()
    {
        $this->expectExceptionMessage('$n must be greater than 0');
        $this->NaturalNumbers->sumOfSquaresOneToN(0);
    }

    public function test_result()
    {
        $this->assertEquals(170,$this->NaturalNumbers->difference(5));
        $this->assertEquals(0,$this->NaturalNumbers->difference(1));
        $this->assertEquals(25164150,$this->NaturalNumbers->difference(100));
    }
}
