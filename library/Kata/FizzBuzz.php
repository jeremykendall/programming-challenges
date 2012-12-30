<?php

/**
 * TDD Library
 *
 * @package Kata
 */

namespace Kata;

/**
 * FizzBuzz class
 *
 * @package Kata
 */
class FizzBuzz
{

    /**
     * Returns Fizz if multiple of 3, Buzz if multiple of 5, FizzBuzz if multiple
     * of 3 and 5. Returns $number if none of those conditions are met.
     *
     * @param  int   $number
     * @return mixed int if not multiple of 3 or 5, string otherwise
     */
    public function of($number)
    {
        $result = null;

        if ($number % 3 == 0) {
            $result = 'Fizz';
        }

        if ($number % 5 == 0) {
            $result .= 'Buzz';
        }

        if (!$result) {
            $result = $number;
        }

        return $result;
    }
}
