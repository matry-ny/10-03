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

/**
 * @param string $type
 * @return bool
 */
function isImage(string $type): bool
{
    $imageTypes = [
        'image/jpeg',
        'image/jpg',
        'image/png',
        'image/gif'
    ];

    return in_array($type, $imageTypes);
}

/**
 * @param string $type
 * @return bool
 */
function isDownloadable(string $type): bool
{
    $downloadableTypes = [
        'application/msword'
    ];

    return in_array($type, $downloadableTypes);
}

/**
 * @param string $type
 * @return bool
 */
function isActive(string $type): bool
{
    $activeTypes = [
        'application/pdf'
    ];

    return  in_array($type, $activeTypes);
}
