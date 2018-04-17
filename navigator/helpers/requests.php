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

/**
 * @return bool
 */
function isPostRequest(): bool
{
    return strtoupper($_SERVER['REQUEST_METHOD']) == 'POST';
}

/**
 * @param string $name
 * @return array
 */
function getUploadedFiles(string $name): array
{
    if (is_string($_FILES[$name]['name'])) {
        return [$_FILES[$name]];
    }

    $files = [];
    $count = count($_FILES[$name]['name']);
    $keys = array_keys($_FILES[$name]);

    for ($i = 0; $i < $count; $i++) {
        foreach ($keys as $key) {
            $files[$i][$key] = $_FILES[$name][$key][$i];
        }
    }

    return $files;
}
