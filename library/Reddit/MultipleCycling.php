<?php

/**
 * Reddit Library
 * 
 * @package  Reddit
 */

namespace Reddit;

/**
 * MultipleCycling class
 * 
 * @package Reddit
 */
class MultipleCycling
{

    /**
     * Write a function that takes two arguments: a limit, lim, and a list of 
     * integers, x. The function counts up from 0 by cycling through x and 
     * skipping numbers until we find the next number that's a multiple of x[i]. 
     * For example, when x is the list [5, 7, 3], start counting from 0:
     *
     * Next multiple of 5 is 5
     * Next multiple of 7 is 7
     * Next multiple of 3 is 9
     * Next multiple of 5 is 10
     * Next multiple of 7 is 14
     * Next multiple of 3 is 15
     *
     * When the count reaches lim or a number above it, return the number of 
     * steps it took to reach it. (multiple_cycle(15, [5, 7, 3]) would return 6.)
     * 
     * @link http://www.reddit.com/r/dailyprogrammer/comments/zx98u/9152012_challenge_98_intermediate_multiple_cycling/ 
     * 
     * @param int $limit
     * @param array $numbers
     * @return int
     */
    public function multipleCycleJeremy($limit, array $numbers)
    {
        // is fail
        $count = 0;
        $index = 0;
        $numbersLength = count($numbers);

        for ($i = 1; $i <= $limit; $i++) {
            if ($i % $numbers[$index] == 0) {
                ++$count;
                ++$index;

                if ($index >= $numbersLength) {
                    $index = 0;
                }
            }
        }

        return $count;
    }

    /**
     * Solution by Reddit user mrthedon.
     * 
     * @param type $lim
     * @param array $x
     * @return int
     */
    public function multipleCycleMrThedon($lim, array $x)
    {
        $steps = 0;
        $count = 1;
        $xPos = 0;
        $xCount = count($x);

        while ($count <= $lim) {
            $current = $x[$xPos];
            $next = ($count + $current) - (($count + $current) % $current);
            $count = $next;
            $steps++;

            $xPos = ($xPos === $xCount - 1) ? 0 : ++$xPos;
        }

        return $steps;
    }

    /**
     * Does a count of multiples of a number from a list up to $max number of iterations
     * 
     * @param  int   $max  Maximum iterations to find multiples over
     * @param  array $nums The list of numbers to check multiples of
     * @return int         The number of multiples found in the list up to $max
     */
    public function multipleCycleGonzalez($max, $nums)
    {
        // Set our return
        $count = 0;

        // Get our count of list of nums
        $numsCount = \count($nums);

        // Get the current key of the nums array
        $numsIx = \key($nums);

        // Start doing the work
        for ($i = 0; $i <= $max; $i++) {
            // We can slip past all of the nums until we get to the first in the
            // list if we have yet to get the first match
            if ($i < $nums[$numsIx]) {
                continue;
            }

            // Calculate our modulus
            $remainder = $i % $nums[$numsIx];

            // If there is no match, adjust as needed to get one
            if ($remainder) {
                $i += ($nums[$numsIx] - $remainder);
            }

            // Add it
            $count++;

            // Move our index for our list of numbers
            // Ternary operation seems to take more time than if/else construct here
            if ($numsIx == $numsCount - 1) {
                // We're at the end of the array, so move to the beginning
                $numsIx = 0;
            } else {
                $numsIx++;
            }
        }

        return $count;
    }

    /**
     * Implementation by David Rogers {@link http://twitter.com/al_the_x}
     *  
     * @param  int   $limit   Maximum iterations to find multiples over
     * @param  array $numbers The list of numbers to check multiples of
     * @return int            The number of multiples found in the list up to $max
     */
    public function multipleCycleAlTheX($limit, array $numbers)
    {
        $current = 0;
        $cycles = 0;

        while ($current < $limit) {
            $cycles++;

            $current = $this->nextHighestMultiple($current, current($numbers));

            \next($numbers) or \reset($numbers);
        }

        return $cycles;
    }

    /**
     * Used by MultipleCycling::multipleCycleAlTheX()
     * 
     * @param int $number
     * @param int $multiple
     * @return int
     */
    protected function nextHighestMultiple($number, $multiple)
    {
        if ($number == 0) {
            return $multiple;
        }

        if ($multiple == 0) {
            return $number;
        }

        return ( ($remainder = $number % $multiple) ?
                $number + $multiple - $remainder : $number
            );
    }
}
