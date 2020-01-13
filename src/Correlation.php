<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 10.01.2020
 */

namespace Correlation;

use Correlation\{Exception\ArgumentIsNotArrayException,
    Exception\ArrayCountNotMatch,
    Exception\EmptyArrayException,
    Exception\ValueIsNotNumericException,
    Coefficient\Pearson,
    Coefficient\Spearman};


/**
 * Class Correlation
 * @package Correlation
 */
class Correlation
{
    /**
     * @var int
     */
    private int $n = 0;

    /**
     * @var array|mixed
     */
    private array $a1 = [];

    /**
     * @var array|mixed
     */
    private array $a2 = [];

    /**
     * @param array $a1
     * @param array $a2
     * @return Pearson
     * @throws ArgumentIsNotArrayException
     * @throws ArrayCountNotMatch
     * @throws EmptyArrayException
     * @throws ValueIsNotNumericException
     */
    public function pearson(array $a1 = null, array $a2 = null)
    {
        $this->setInput($a1, $a2);

        return new Pearson($this->a1, $this->a2, $this->n);
    }

    /**
     * @param $a1
     * @param $a2
     * @return Spearman
     * @throws ArgumentIsNotArrayException
     * @throws ArrayCountNotMatch
     * @throws EmptyArrayException
     * @throws ValueIsNotNumericException
     */
    public function spearman($a1, $a2)
    {
        $this->setInput($a1, $a2);

        return new Spearman($this->a1, $this->a2, $this->n);
    }

    /**
     * @param $a1
     * @param $a2
     * @throws ArgumentIsNotArrayException
     * @throws ArrayCountNotMatch
     * @throws EmptyArrayException
     * @throws ValueIsNotNumericException
     */
    private function setInput($a1, $a2)
    {
        $this->n = $this->checkArray($a1, 1);
        $n1 = $this->checkArray($a2, 2);
        $this->compareArraysCount($this->n, $n1);
        $this->a1 = $this->setValueType($a1, 1);
        $this->a2 = $this->setValueType($a2, 2);
    }

    /**
     * @param $a
     * @param $num
     * @return int
     * @throws ArgumentIsNotArrayException
     * @throws EmptyArrayException
     */
    private function checkArray($a, $num)
    {
        if (! is_array($a)) {
            throw new ArgumentIsNotArrayException($num);
        }

        $n = count($a);

        if (! $n) {
            throw new EmptyArrayException($num);
        }

        return $n;
    }

    /**
     * @param $c1
     * @param $c2
     * @return bool
     * @throws ArrayCountNotMatch
     */
    private function compareArraysCount($c1, $c2)
    {
        if ($c1 != $c2) {
            throw new ArrayCountNotMatch;
        }

        return true;
    }

    /**
     * @param $a
     * @param $num
     * @return mixed
     * @throws ValueIsNotNumericException
     */
    private function setValueType($a, $num)
    {
        foreach ($a as $k => $v) {
            if (! is_numeric($v)) {
                throw new ValueIsNotNumericException($num);
            }

            $a[$k] = strpos($v, '.') !== false ? (float)$v : (int)$v;
        }

        return $a;
    }
}