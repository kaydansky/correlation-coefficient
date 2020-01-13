<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 10.01.2020
 */

namespace Correlation\Exception;


class ArgumentIsNotArrayException extends CorrelationException
{
    public function __construct($num)
    {
        parent::__construct(sprintf('Argument %s is not an array.', $num), 1);
    }
}