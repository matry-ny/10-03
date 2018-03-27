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

    for (; $start <= $end; $start++)
    {
        if ($start == 2) {
            $numbers[] = 2;
            continue;
        }

        if($start == 1 || $start % 2 == 0) {
            continue;
        }

        $tmp = [];
        for ($i = 1; $i <= $start; $i = $i + 1) {
            if ($start % $i == 0) {
                $tmp[] = $i;
            }
        }

        if (count($tmp) == 1) {
            $numbers[] = $start;
        }
    }

    echo implode(', ', $numbers), PHP_EOL;
};
