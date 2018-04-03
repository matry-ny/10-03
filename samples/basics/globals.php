<?php

$test = 1;

function globalSome()
{
//    $GLOBALS['test'] = 2;
//    unset($GLOBALS['test']);
//    $GLOBALS['qq'] = 123;

    global $test;
    $test++;
//    unset($test);
}

function doSome($qwe)
{
    $qwe++;
    var_dump($qwe);
}

echo "Pre: {$test}<br>";
//globalSome();
call_user_func(function () use ($test) {
    $test++;
    var_dump($test);
});

doSome($test);

echo "After: {$test}<hr>";

function doStatic()
{
    static $counter = 1;
    var_dump($counter);

    $counter++;

    return mt_rand() . '<br>';
}

echo doStatic(), doStatic(), doStatic();