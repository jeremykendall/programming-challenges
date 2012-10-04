<?php

/**
 * Reddit Library
 * 
 * @package Reddit
 */

namespace Reddit;

/**
 * NCharacterSetStrings class
 * 
 * From: http://www.reddit.com/r/dailyprogrammer/comments/10pf4a/9302012_challenge_102_intermediate_ncharacterset/
 * 
 * Write a function that takes a string s and an integer n, and returns whether 
 * or not the string s contains at most n different characters.
 * For example, ncset("aacaabbabccc", 4) would return true, because it contains 
 * only 3 different characters, 'a', 'b', and 'c', and 3 ≤ 4.
 *
 * For how many English words (yes, it's time for this dictionary again!) does ncset(word, 4) hold?
 * 
 * Dictionary: http://code.google.com/p/dotnetperls-controls/downloads/detail?name=enable1.txt
 * 
 * @package Reddit
 */
class NCharacterSetStrings
{

    /**
     * Determines whether or not $string contains at most $limit different characters.
     * 
     * @param string $string
     * @param int $limit
     * @return bool true if $string contains at most $limit different chars, false otherwise
     */
    public function ncset($string, $limit)
    {
        return (count(count_chars($string, 1)) <= $limit);
    }
}
