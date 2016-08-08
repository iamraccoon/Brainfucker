<?php

namespace components;

/**
 * Class FuckCode
 */
class FuckCode
{
    private function getRandomCoefficientRate(int $firstAttempt = 1): int
    {
        if ($firstAttempt) {
            return rand(7, 18);
        }

        return rand(2, 7);
    }

    public function getCountFirstLetters(int $necessaryCode): int
    {
        $k = $necessaryCode % $this->getRandomCoefficientRate();

        if (!$k) {
            $k = $this->getRandomCoefficientRate($k);
        }

        return $k;
    }

    public function getLoopLetters(int $count): string
    {
        $result = '[>';
        while ($count) {
            $result .= '+';
            $count--;
        }
        $result .= '<-]';

        return $result;
    }

    public function getFirstLetters(int $count): string
    {
        $result = '';
        while ($count) {
            $result .= '+';
            $count--;
        }

        return $result;
    }

    public function getEndLetters(string $resultingString, int $ensureAsciiCode): string
    {
        $brainArray = $this->makeBrainCode($resultingString);
        $currentAsciiCode = array_pop($brainArray);

        $result = '>';

        while ($currentAsciiCode != $ensureAsciiCode) {
            $result .= '+';
            $currentAsciiCode++;
        }

        $result .= '.';

        return $result;
    }

    public function getCountLoopLetters(int $necessaryCode, int $countFirstLetters): int
    {
        return floor($necessaryCode / $countFirstLetters);
    }

    private function makeBrainCode(string $string): array
    {
        $arrayChars = str_split($string);
        $result = array();

        $i = 0;
        for ($j = 0; $j < count($arrayChars); $j++) {
            switch ($arrayChars[$j]) {
                case '+':
                    $result[$i]++;
                    break;
                case '-':
                    $result[$i]--;
                    break;
                case '>':
                    $i++;
                    break;
                case '<':
                    $i--;
                    break;
                case "[" :
                    if (!$result[$i]) {
                        $hasBrackets = false;
                        while (!$hasBrackets) {
                            $j++;
                            if ($arrayChars[$j] == ']') {
                                $hasBrackets = true;
                            }
                        }
                    }
                    break;
                case "]" :
                    if ($result[$i]) {
                        $hasBrackets = false;
                        while (!$hasBrackets) {
                            $j--;
                            if ($arrayChars[$j] == '[') {
                                $hasBrackets = true;
                            }
                        }
                    }
                    break;
            }
        }

        return $result;
    }
} 