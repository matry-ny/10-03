<?php

while (true) {
    echo 'Enter first border: ';
    $start = (int)readline();

    echo 'Enter last border: ';
    $end = (int)readline();

    if ($start >= $end) {
        echo 'Incorrect borders', PHP_EOL;
        continue;
    }

    $numbers = [];
    for ($current = $start; $current <= $end; $current++) {
        if ($current % 2 === 0) {
            $numbers[] = $current;
        }
    }

    echo implode(', ', $numbers), PHP_EOL;
};
