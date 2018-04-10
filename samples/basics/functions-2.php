<?php

function toArray(...$elements)
{
    return $elements;
}

var_dump(toArray(1, 2, 54, 67, 88)[2]);
list($var1, $var2, $var3) = toArray(44, 123, 'test');
var_dump($var1, $var2, $var3);

extract(['test' => 22222, 'qq' => 333]);
var_dump($test, $qq);
