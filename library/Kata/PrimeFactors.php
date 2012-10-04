<?php

/**
 * Kata Library
 * 
 * @package Kata
 * @author Jeremy Kendall <jeremy@jeremykendall.net>
 */

namespace Kata;

/**
 * PrimeFactors class
 * 
 * See {@link http://butunclebob.com/ArticleS.UncleBob.ThePrimeFactorsKata} for 
 * info about this kata
 * 
 * @package Kata
 * @author Jeremy Kendall <jeremy@jeremykendall.net>
 */
class PrimeFactors
{

    /**
     * Returns array of prime factors
     * 
     * @param int $n
     * @return array
     */
    public function generate($n)
    {
        $primes = array();
        
        for ($candidate = 2; $n > 1; $candidate++) {
            for (; $n % $candidate == 0; $n /= $candidate) {
                $primes[] = $candidate;
            }
        }

        return $primes;
    }
}
