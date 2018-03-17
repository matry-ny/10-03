<?php

echo 1, 'test', 123;
echo(22);

$test = print('test');
var_dump($test);

var_dump('test \n $test', "test \n {$test}");
$string = <<<JS
alert('{$test}');
JS;
$string2 = <<<'JS'
alert('{$test}');
JS;

echo "<script>{$string}{$string2}</script>";
