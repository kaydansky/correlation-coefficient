<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 10.01.2020
 */

namespace Correlation\Exception;


class ValueIsNotNumericException extends CorrelationException
{
    public function __construct($num)
    {
        parent::__construct(sprintf('Not numeric value in array %s.', $num), 2);
    }
}