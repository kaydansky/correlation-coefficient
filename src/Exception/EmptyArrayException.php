<?php
/**
 * Correlation Coefficient
 *
 * @author: Alex Kaydansky
 * Date: 10.01.2020
 */

namespace Correlation\Exception;


class EmptyArrayException extends CorrelationException
{
    public function __construct($num)
    {
        parent::__construct(sprintf('Array %s is empty.', $num), 3);
    }
}