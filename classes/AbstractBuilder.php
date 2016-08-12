<?php

/**
 * Class AbstractBuilder
 */
abstract class AbstractBuilder
{
    /**
     * @param string $char
     * @return int
     */
    public function getNecessaryAsciiCode(string $char): int
    {
        return ord($char);
    }

    /**
     * @param int $necessaryAsciiCode
     * @return mixed
     */
    abstract public function getCountFirstLetters(int $necessaryAsciiCode);

    /**
     * @param int $necessaryCode
     * @param int $countFirstLetters
     * @return mixed
     */
    abstract public function getCountLoopLetters(int $necessaryCode, int $countFirstLetters);

    /**
     * @param string $resultingString
     * @param int $ensureAsciiCode
     * @return mixed
     */
    abstract public function getCountLastLetters(string $resultingString, int $ensureAsciiCode);

    /**
     * @param int $countFirstSymbols
     * @return mixed
     */
    abstract public function getFirstLetters(int $countFirstSymbols);

    /**
     * @param int $countLoopSymbols
     * @return mixed
     */
    abstract public function getLoopLetters(int $countLoopSymbols);

    /**
     * @param int $countLastSymbols
     * @return mixed
     */
    abstract public function getLastLetters(int $countLastSymbols);
}
