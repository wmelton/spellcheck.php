<?php

    /**
     * Copyright (c) 2011, Simon de Vlieger
     * All rights reserved.
     *
     * Redistribution and use in source and binary forms, with or without
     * modification, are permitted provided that the following conditions are met:
     *    * Redistributions of source code must retain the above copyright
     *      notice, this list of conditions and the following disclaimer.
     *    * Redistributions in binary form must reproduce the above copyright
     *      notice, this list of conditions and the following disclaimer in the
     *      documentation and/or other materials provided with the distribution.
     *    * Neither the name of the organization nor the
     *      names of its contributors may be used to endorse or promote products
     *      derived from this software without specific prior written permission.

     * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
     * ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
     * WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
     * DISCLAIMED. IN NO EVENT SHALL SIMON DE VLIEGER BE LIABLE FOR ANY
     * DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
     * (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
     * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
     * ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
     * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
     * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
     **/

    /**
     * Authored by:
     * - Simon de Vlieger <simon@ikanobori.jp> <http://ikanobori.jp>
     **/

    /**
     * Implementations of several algorithms commonly used for spellcheckings.
     *
     * Amongst the implementations are Levehnstein, Damerau-Levehnstein,
     * Baeza-Yates-Gomet, N-Gram (M1, M2).
     *
     * The algorithms implemented are all listed and described on the very
     * helpful page of Nikita at:
     * http://ntz-develop.blogspot.com/2011/03/fuzzy-string-search.html
     **/

    interface Spellchecker {
        public function get_alternatives($word);
    }

    /**
     * This class works with the Levehnstein distance. 
     **/

    class Levenshtein implements Spellchecker {

        private function get_score($word, $alternative) {
            $m = strlen($word);
            $n = strlen($alternative);

            for($i = 0; $i < $m; $i++) $d[$i][0] = $i;
            for($j = 0; $j < $n; $j++) $d[0][$j] = $j;

            for($i = 0; $i < $m; $i++) {
                for($j = 1; $j < $n; $j++) {
                    $c = ($s[$i-1] == $t[$j-1]) ? 0 : 1;
                    $d[$i][$j] = min($d[$i-1][$j]+1, $d[$i][$j-1]+1, $d[$i-1][$j-1] + $c);
                }
            }

            return $d[$m][$n];

        }

        public function get_alternatives($word) {
        }

    }


    /**
     * This class works with the Damerau-Levehnstein distance. This is an adjusted
     * version of the Levehnstein algorithm which adds one more rule: transposition
     * of two adjacent letters are counted as one operation, along with insertions,
     * deletions and substitutions.
     **/

    class DamerauLevenshtein implements Spellchecker {

        private function get_score($word, $alternative) {
        }

        public function get_alternatives($word) {
        }

    }

    /**
     * N-Grams work by iterating over the string getting n-number of characters
     * per iteration and comparing those n characters to the list of known
     * words.
     **/

    class NGram implements Spellchecker {

        public function get_alternatives($word) {

        }

    }

?>
