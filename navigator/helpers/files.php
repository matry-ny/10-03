<?php

/**
 * @param string $dir
 * @param array $excluded
 * @return array
 */
function scanDirectory(string $dir, array $excluded = []): array
{
    $files = array_filter(scandir($dir), function ($item) use ($excluded) {
        return !in_array($item, array_merge(['.', '..'], $excluded));
    });

    return $files;
}
