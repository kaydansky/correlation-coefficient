# Correlation Coefficient Calculation

A **correlation coefficient** is a numerical measure of some type of correlation, meaning a statistical relationship between two variables.

A statistic used to show how the scores from one measure relate to scores on a second measure for the same group of individuals. A high value (approaching +1.00) is a strong direct relationship, a low negative value (approaching -1.00) is a strong inverse relationship, and values near 0.00 indicate little, if any, relationship.

[Learn more](https://en.wikipedia.org/wiki/Correlation_coefficient)

## Features

Two types of correlation coefficient are implemented currently:

* [Pearson](https://en.wikipedia.org/wiki/Pearson_correlation_coefficient)
* [Spearman](https://en.wikipedia.org/wiki/Spearman%27s_rank_correlation_coefficient)

Unlimited instance number of every type's object.

## Example of usage:

[Correlation Coefficient Calculator](http://cc-calculator.ruscoder.com)

## Requirements

* PHP >= 7.4.0

## Installation

```
$ composer require kaydansky/correlation-coefficient
```

## Basic Usage

```php
<?php

use Correlation\{Correlation, Exception\CorrelationException};

$correlation = new Correlation();

$age = [43, 21, 25, 42, 57, 59];
$glucoseLevel = [99, 65, 79, 75, 87, 81];

try {
    var_dump($correlation->pearson($age, $glucoseLevel));
} catch (CorrelationException $e) {
    echo $e->getMessage();
}

$IQ = [106, 86, 100, 101, 99, 103, 97, 113, 112, 110];
$hoursOfTvPerWeek = [7, 0, 27, 50, 28, 29, 20, 12, 6, 17];

try {
    var_dump($correlation->spearman($IQ, $hoursOfTvPerWeek));
} catch (CorrelationException $e) {
    echo $e->getMessage();
}
```

* The library provides 2 methods according to coefficient type:

```php
$correlation->pearson($arrayX, $arrayY);
$correlation->spearman($arrayX, $arrayY);
```

* Each method returns an object with 2 elements:

```php
float|int $coefficient; // Value from -1 to 1
float|int $percentage; // Same value percentage
```
* Every array must contain numeric values only: integer, float, numeric string.
* Arrays pair must have equal number of elements.

## License

This software is licensed under the MIT License. See the LICENSE file for details.