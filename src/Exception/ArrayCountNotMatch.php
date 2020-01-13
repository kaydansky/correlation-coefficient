<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 10.01.2020
 */

namespace Correlation\Exception;


class ArrayCountNotMatch extends CorrelationException
{
    public function __construct()
    {
        parent::__construct('Number of elements in arrays don\'t match.', 4);
    }
}