<?php

$test = 1;
$test = ['1, 2'];

$string = 'test';
var_dump((bool)$test, $test, boolval($test), intval($test), $string[1]);

$test = null;

$round = 22;
var_dump(round(1.5), $round);

$myFavoriteVariable = null;

echo '<hr>';

$round2 = &$round;
$round2++;
$round += 10;

var_dump($round, $round2);

echo '<hr>';

$test = 1;
$q = 'test';
var_dump($$q);
