<?php

namespace components;

/**
 * Class FuckDirector
 * @package components
 */
class Director
{
    /**
     * @var AbstractBuilder
     */
    private $builder;

    /**
     * FuckDirector constructor.
     * @param AbstractBuilder $builder
     */
    public function __construct(AbstractBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * @param $char
     * @return mixed|string
     */
    public function build($char)
    {
        $necessaryAsciiCode = $this->builder->getNecessaryAsciiCode($char);

        $countFirstSymbols = $this->builder->getCountFirstLetters($necessaryAsciiCode);
        $countLoopSymbols = $this->builder->getCountLoopLetters($necessaryAsciiCode, $countFirstSymbols);

        $resultingString = $this->builder->getFirstLetters($countFirstSymbols);
        $resultingString .= $this->builder->getLoopLetters($countLoopSymbols);

        $countEndSymbols = $this->builder->getCountLastLetters($resultingString, $necessaryAsciiCode);
        $resultingString .= $this->builder->getLastLetters($countEndSymbols);

        return $resultingString;
    }
}
