<?php

$numeric = array(
    2,
    'test',
    '123',
    44 => 44444,
    3443,
    null,
    false,
    46 => 999,
    44 => 55555,
    56 => 'qwerty',
    55555,
    3443,
    2
);

$numeric[] = 'new element';
$numeric[46] = 'updated';
//$numeric[46] = [1, 2, 3];
$numeric['test'] = 'Some string';

var_dump($numeric);

var_dump(array_key_exists(45, $numeric));
var_dump(in_array(55555, $numeric));
var_dump(array_unique($numeric));

ksort($numeric);

var_dump($numeric);


echo '<hr>';


$assoc = [
    'name' => 'Dmytro',
    'age' => 28,
    'position' => 'Senior PHP developer'
];
var_dump($assoc);

$multidimentional = [
    [
        'name' => 'Dmytro',
        'age' => 28,
        'position' => 'Senior PHP developer',
        'skills' => ['PHP', 'MySQL', 'JS'],
        'is_active'
    ],
    [
        'name' => 'Arsen',
        'age' => 33,
        'position' => 'QA',
        'skills' => ['manual', 'automatic'],
        'is_active'
    ]
];
$multidimentional[0]['skills'][2] = 'C#';
var_dump($multidimentional);

$serialized = serialize($multidimentional);
$unSerialized = unserialize($serialized);

var_dump($unSerialized);
var_dump(count($unSerialized));

$firstMember = array_shift($unSerialized);
var_dump($firstMember, $unSerialized);

array_push($unSerialized, $firstMember);
var_dump($unSerialized);

$summary = compact('numeric', 'assoc', 'multidimentional');
var_dump($summary);

var_dump($GLOBALS);
