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
 * @return string
 */
function getFileContent(string $file): string
{
    $handler = fopen($file, 'r');
    $content = '';
    while ($part = fread($handler, 1024)) {
        $content .= htmlspecialchars($part);
    }

    fclose($handler);

    return $content;
}
