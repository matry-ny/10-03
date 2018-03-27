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
        //1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
        if($start == 1) {
            continue;
        }

        //2 is prime (the only even number that is prime)
        if($start == 2) {
            continue;
        }

        /**
         * if the number is divisible by two, then it's not prime and it's no longer
         * needed to check other even numbers
         */
        if($start % 2 == 0) {
            continue;
        }

        /**
         * Checks the odd numbers. If any of them is a factor, then it returns false.
         * The sqrt can be an aproximation, hence just for the sake of
         * security, one rounds it to the next highest integer value.
         */
        $ceil = ceil(sqrt($start));
        $continue = false;
        for($i = 3; $i <= $ceil; $i = $i + 2) {
            if($start % $i == 0) {
                $continue = true;
                break;
            }
        }

        if ($continue) {
            continue;
        }

        $numbers[] = $start;
    }

    echo implode(', ', $numbers), PHP_EOL;
};

function isPrime($num) {
    //1 is not prime. See: http://en.wikipedia.org/wiki/Prime_number#Primality_of_one
    if($num == 1)
        return false;

    //2 is prime (the only even number that is prime)
    if($num == 2)
        return true;

    /**
     * if the number is divisible by two, then it's not prime and it's no longer
     * needed to check other even numbers
     */
    if($num % 2 == 0) {
        return false;
    }

    /**
     * Checks the odd numbers. If any of them is a factor, then it returns false.
     * The sqrt can be an aproximation, hence just for the sake of
     * security, one rounds it to the next highest integer value.
     */
    $ceil = ceil(sqrt($num));
    for($i = 3; $i <= $ceil; $i = $i + 2) {
        if($num % $i == 0)
            return false;
    }

    return true;
}
