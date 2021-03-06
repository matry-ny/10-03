<?php

$array = [
    1,
    3,
    'data' => [
        3,
        [
            'test',
            '111' => 111,
            'test' => [
                '12313',
                9999,
                'dfsfdf'
            ]
        ]
    ],
    'qqqq' => [1, 2]
];

var_dump(count($array, COUNT_RECURSIVE));

function countRecursive($array)
{
    $count = 0;
    foreach ($array as $value) {
        $count++;
        if (is_array($value)) {
            $count += countRecursive($value);
        }
    }

    return $count;
}

var_dump(countRecursive($array));

function renderArray($array, $tabStep = 1, $isCli = false)
{
    $tabSymbol = $isCli ? ' ' : '&nbsp;';
    $lineSeparator = $isCli ? PHP_EOL : '<br>';

    $tabElement = str_repeat($tabSymbol, 4);
    $tab = str_repeat($tabElement, $tabStep);

    $result = "[{$lineSeparator}";
    foreach ($array as $key => $value) {
        $data = is_array($value) ? renderArray($value, $tabStep + 1, $isCli) : $value;
        $result .= "{$tab}{$key} => {$data}{$lineSeparator}";
    }

    $endTab = str_repeat($tabElement, $tabStep - 1);
    return "{$result}{$endTab}]";
}

echo renderArray($array);