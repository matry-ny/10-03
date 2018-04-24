<?php

function initSession(): void
{
    if (empty(session_id())) {
        session_start();
    }
}

function dropSession(): void
{
    session_destroy();
    session_unset();
}

function saveToSession(string $key, $data): void
{
    initSession();
    $_SESSION[$key] = $data;
}

/**
 * @param string $key
 * @param null|mixed $default
 * @return mixed
 */
function getFromSession(string $key, $default = null)
{
    initSession();
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}

/**
 * @param string $key
 */
function removeFromSession(string $key): void
{
    initSession();
    if (array_key_exists($key, $_SESSION)) {
        unset($_SESSION[$key]);
    }
}
