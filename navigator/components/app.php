<?php

$configStorage = [];

function runApplication(array $configuration)
{
    global $configStorage;
    $configStorage = $configuration;

    userAuth();

    list($controller, $action) = getParts($_SERVER['REQUEST_URI']);
    $controllerFile = getControllerFile($controller);
    $actionFunction = 'action' . camelize($action);

    return runAction($controllerFile, $actionFunction);
}

/**
 * @param string $controller
 * @param string $action
 * @return mixed
 */
function runAction(string $controller, string $action)
{
    require_once $controller;
    if (!function_exists($action)) {
        die("Action \"{$action}\" is not exists");
    }

    return $action();
}

/**
 * @param string $controller
 * @return string
 */
function getControllerFile(string $controller): string
{
    $baseDir = getFromConfig('baseDir');
    $controller = camelize($controller);
    $file = "{$baseDir}/controllers/{$controller}Controller.php";
    if (!file_exists($file)) {
        die("Controller \"{$controller}\" is not exists");
    }

    return $file;
}

/**
 * @param string $request
 * @return array
 */
function getParts(string $request): array
{
    $parts = explode('/', clearUrl($request));
    if (!isset($parts[0]) || empty($parts[0])) {
        $parts[0] = 'index';
    }
    if (!isset($parts[1]) || empty($parts[1])) {
        $parts[1] = 'index';
    }

    return $parts;
}

/**
 * @param string $url
 * @return string
 */
function clearUrl(string $url): string
{
    $url = trim($url, " \t\n\r\0\x0B/");
    $getParamsStart = stripos($url, '?');
    if (false !== $getParamsStart) {
        $url = substr($url, 0, $getParamsStart);
    }

    return $url;
}

/**
 * @param string $key
 * @param null|mixed $default
 * @return mixed
 */
function getFromConfig(string $key, $default = null)
{
    global $configStorage;
    return array_key_exists($key, $configStorage) ? $configStorage[$key] : $default;
}
