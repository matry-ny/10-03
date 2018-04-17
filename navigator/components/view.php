<?php

/**
 * @param string $template
 * @param array $variables
 * @return string
 */
function render(string $template, array $variables = []): string
{
    extract($variables);

    ob_start();
    require_once findTemplateFile($template);
    $content = ob_get_clean();

    ob_start();
    require_once findTemplateFile('layouts/main');
    return ob_get_clean();
}

/**
 * @param string $file
 * @return string
 */
function findTemplateFile(string $file): string
{
    $baseDir = getFromConfig('baseDir');
    $template = "{$baseDir}/views/{$file}.php";
    if (!file_exists($template)) {
        die("Template \"{$file}\" is not exists");
    }

    return $template;
}
