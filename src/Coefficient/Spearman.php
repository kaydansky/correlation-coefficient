<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 13.01.2020
 */

namespace Correlation\Coefficient;


/**
 * Class Spearman
 * @package Correlation\Coefficient
 */
class Spearman
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
     * Spearman constructor.
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
        $a = array_combine($a1, $a2);
        ksort($a);
        $b = array_flip(array_keys($a));
        asort($a);
        $c = array_flip(array_values($a));
        $d = 0;

        foreach ($a as $k => $v) {
            $d += ($b[$k] - $c[$v]) ** 2;
        }

        return 1 - (6 * $d) / ($n * (($n ** 2) - 1));
    }
}