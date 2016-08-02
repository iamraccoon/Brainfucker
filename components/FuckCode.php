<?php

class FuckCode
{
    public function getRandomCoefficientRate($firstAttempt = 1)
    {
        if ($firstAttempt) {
            return rand(7, 18);
        }

        return rand(2, 7);
    }

    public function getCountFirstLetters($necessaryCode)
    {
        $k = $necessaryCode % $this->getRandomCoefficientRate();

        if (!$k) {
            $k = $this->getRandomCoefficientRate($k);
        }

        return $k;
    }

    public function getLoopLetters($count)
    {
        $result = '[>';
        while ($count) {
            $result .= '+';
            $count--;
        }
        $result .= '<-]';

        return $result;
    }

    public function getFirstLetters($count)
    {
        $result = '';
        while ($count) {
            $result .= '+';
            $count--;
        }

        return $result;
    }

    public function getEndLetters($resultingString, $ensureAsciiCode)
    {
        $arr = str_split($resultingString);
        $res = array();

        $i = 0;
        for($j = 0; $j < count($arr); $j++) {
            switch ($arr[$j]) {
                case '+':
                    $res[$i]++;
                    break;
                case '-':
                    $res[$i]--;
                    break;
                case '>':
                    $i++;
                    break;
                case '<':
                    $i--;
                    break;
                case "[" :
                    if(!$res[$i]) {
                        $hasBrackets = false;
                        while(!$hasBrackets) {
                            $j++;
                            if($arr[$j] == ']') {
                                $hasBrackets = true;
                            }
                        }
                    }
                    break;
                case "]" :
                    if($res[$i]) {
                        $hasBrackets = false;
                        while(!$hasBrackets) {
                            $j--;
                            if($arr[$j] == '[') {
                                $hasBrackets = true;
                            }
                        }
                    }
                    break;
            }
        }

        $currentAsciiCode = array_pop($res);

        $result = '>';

        while ($currentAsciiCode != $ensureAsciiCode) {
            $result .= '+';
            $currentAsciiCode++;
        }

        $result .= '.';

        return $result;
    }

    public function getCountLoopLetters($necessaryCode, $countFirstLetters)
    {
        return floor($necessaryCode / $countFirstLetters);
    }
} 