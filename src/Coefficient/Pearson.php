<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 13.01.2020
 */

namespace Correlation\Coefficient;


/**
 * Class Pearson
 * @package Correlation\Coefficient
 */
class Pearson
{
    /**
     * @var float|int
     */
    public $coefficient = 0;

    /**
     * @var false|float|int
     */
    public $percentage = 0;

    /**
     * Pearson constructor.
     * @param $a1
     * @param $a2
     * @param $n
     */
    public function __construct($a1, $a2, $n)
    {
        $this->coefficient = $this->calculate($a1, $a2, $n);
        $this->percentage = round($this->coefficient * 100, 2);
    }

    /**
     * @param $a1
     * @param $a2
     * @param $n
     * @return float|int
     */
    private function calculate($a1, $a2, $n)
    {
        $calc = [];

        for ($i = 0; $i < $n; $i++) {
            $calc['xy'][$i] = $a1[$i] * $a2[$i];
            $calc['x2'][$i] = $a1[$i] ** 2;
            $calc['y2'][$i] = $a2[$i] ** 2;
        }

        $sumX = array_sum($a1);
        $sumY = array_sum($a2);

        return ($n * array_sum($calc['xy']) - ($sumX * $sumY)) /
            sqrt(
                ($n * array_sum($calc['x2']) - ($sumX ** 2)) *
                ($n * array_sum($calc['y2']) - ($sumY ** 2))
            );
    }
}