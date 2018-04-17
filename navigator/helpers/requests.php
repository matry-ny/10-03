<?php

/**
 * @param string $url
 * @param int $code
 * @param bool $terminate
 */
function redirect(string $url, int $code = 301, bool $terminate = true): void
{
    header("Location: {$url}", true, $code);
    if ($terminate) {
        exit;
    }
}
