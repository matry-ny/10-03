<?php

/**
 * @param string $string
 * @return string
 */
function camelize(string $string): string
{
    $result = '';
    foreach (explode('-', $string) as $part) {
        $result .= ucfirst(strtolower($part));
    }

    return $result;
}
