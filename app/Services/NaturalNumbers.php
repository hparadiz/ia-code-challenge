<?php

namespace App\Services;

use Exception;

/**
 * A Laravel service class for calculating
 *  1. the sum of the squares of the first n natural numbers
 *  2. the square of the sum of the same first n natural numbers, where n is guaranteed to be no greater than 100.
 *
 *  @example
 *  The sum of the squares of the first ten natural numbers is:
 *  1^2 + 2^2 + ... + 10^2 = 385
 *
 *  The square of the sum of the first ten natural numbers is:
 *  (1 + 2 + ... + 10)^2 = 552 = 3025
 *
 *  Hence the difference between the su m of the squares of the first ten natural numbers and the square of the sum is 3025 − 385 = 2640.
 *
 * @author Henry Paradiz <henry.paradiz@gmail.com>
 */
class NaturalNumbers
{


    /**
     * returns the sum of the squares of the first n natural numbers
     *
     * @param integer $n
     * @return integer the sum of the squares of the first n natural numbers
     */
    public function sumOfSquaresOneToN(int $n): int
    {
        if ($n === 0) {
            throw new Exception('$n must be greater than 0');
        }

        $result = 0;

        foreach(range(1,$n) as $number) {
            $result += $number ** 2;
        }

        return $result;
    }

    /**
     * returns the square of the sum of the same first n natural numbers, where n is guaranteed to be no greater than 100.
     * @param integer $n
     * @return integer the square of the sum of the same first n natural numbers
     */
    public function squareOfSumOfOneToN(int $n): int
    {
        if ($n === 0) {
            throw new Exception('$n must be greater than 0');
        }

        if ($n > 100) {
            throw new Exception('Values of $n over 100 are not supported');
        }

        $result = 0;

        foreach(range(1,$n) as $number) {
            $result += $number;
        }

        return $result ** 2;
    }

    /**
     * Returns the difference between sumOfSquaresOneToN and squareOfSumOfOneToN for a given natural number n
     *
     * @param integer $n
     * @return integer Difference between sumOfSquaresOneToN and squareOfSumOfOneToN for a given natural number n
     */
    public function difference(int $n): int
    {
        if ($n === 0) {
            throw new Exception('$n must be greater than 0');
        }

        return $this->squareOfSumOfOneToN($n) - $this->sumOfSquaresOneToN($n);
    }
}
