<?php

function employee(
    string $name,
    int $age,
    string $position,
    array $skills = [],
    string $experience = '',
    bool $gratingOnly = false
): string {
    $result = "Hello, {$position} {$name} ({$age} years old)";
    if ($gratingOnly) {
        return "{$result}<hr>";
    }

    if ($experience) {
        $result .= "<br>{$experience} year of experience";
    }

    if ($skills) {
        $result .= '<br>';
        $result .= implode(', ', $skills);
    }

    $result .= '<hr>';

    return $result;
}

echo employee('Dmytro', 28, 'PHP dev', ['PHP', 'JS', 'C#'], '5+', true);
echo employee('Alex', 22, 'JS dev', [], '5+');
echo employee('Anton', 44, 'Dev Ops', ['Jenkins'], '5+');

function sumOld($label)
{
    $args = func_get_args();
//    var_dump(func_num_args(), $args, func_get_arg(3));
    $sum = array_sum(array_slice($args, 1));
    return "{$label}: {$sum}<br>";
}

$sumResult = sumOld('101 dalmatins', 1, 4, 5, 6, 88, 9, 34);
echo $sumResult;

function sumNew($label, ...$numbers)
{
    $sum = array_sum($numbers);
    return "{$label}: {$sum}<br>";
}

echo sumNew('101 dalmatins', 1, 4, 5, 6, 88, 9, 34);

$func = 'sumNew';
echo $func('test', 1, 2, 4);

function test($func, ...$args)
{
    return call_user_func_array($func, $args);
}
echo test('sumNew', 'Test 2', 1, 2);

$array = [1, 4, 'test', 33.3, [1, 3]];
$add = 33.3;
$filtered = array_filter($array, function ($item) use ($add) {
    return is_int($item) || $item === $add;
});
var_dump($filtered, $array);

