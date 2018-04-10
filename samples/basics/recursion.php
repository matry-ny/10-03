<?php

$control = pow(3, 3);
var_dump($control);

function power($number, $power)
{
    if ($power == 1) {
        return $number;
    }
    if ($power == 0) {
        return 1;
    }

    return $number * power($number, $power - 1);
}

var_dump(power(3, 3));

