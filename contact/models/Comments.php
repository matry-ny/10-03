<?php

/**
 * @return array
 */
function getCommentsList(): array
{
    $dir = getCommentsStorageDir();
    $files = scanDirectory($dir, ['.gitignore']);
    $comments = [];
    foreach ($files as $file) {
        $content = unserialize(file_get_contents($dir . '/' . $file));
        $content['file'] = $file;

        $comments[] = $content;
    }

    return $comments;
}

/**
 * @param array $data
 * @return bool|int
 */
function saveComment(array $data)
{
    $serialized = serialize($data);
    $file = getNewFileName();

    return file_put_contents($file, $serialized);
}

/**
 * @return string
 */
function getNewFileName(): string
{
    do {
        $file = getCommentsStorageDir() . '/' . time() . '_comment.txt';
    } while (file_exists($file));

    return $file;
}

/**
 * @return string
 */
function getCommentsStorageDir(): string
{
    $baseDir = getFromConfig('baseDir');
    return "{$baseDir}/storage/comments";
}
