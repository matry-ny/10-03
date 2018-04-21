<?php

/**
 * @param string $dir
 * @return array
 */
function filesList(string $dir): array
{
    $items = [];
    foreach (scandir($dir) as $item) {
        $rout = "{$dir}/{$item}";
        $action = is_dir($rout) ? "/?rout={$rout}" : "/files/view?rout={$rout}";

        $items[] = ['name' => $item, 'action' => $action];
    }

    return $items;
}

/**
 * @param string $file
 * @param bool $toHtml
 * @return string
 */
function getFileContent(string $file, bool $toHtml = true): string
{
    $handler = fopen($file, 'r');
    $content = '';
    while ($part = fread($handler, 1024)) {
        $content .= $toHtml ? htmlspecialchars($part) : $part;
    }

    fclose($handler);

    return $content;
}

/**
 * @param string $file
 * @param bool $terminate
 */
function downloadFile(string $file, $terminate = true)
{
    header('Content-Description: File Transfer');
    header('Content-Type: ' . mime_content_type($file));
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Length: ' . filesize($file));

    $handler = fopen($file, 'r');
    while ($part = fread($handler, 1024)) {
        echo $part;
    }

    fclose($handler);
    if ($terminate) {
        exit;
    }
}
