<?php

/**
 * @return bool
 */
function isUserGuest(): bool
{
    if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
        doAuth($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']);
    }

    return empty(getFromSession('user'));
}

/**
 * @param string $login
 * @param string $pass
 */
function doAuth(string $login, string $pass): void
{
    $users = getFromConfig('users');
    $filteredUsers = array_filter($users, function ($item) use ($login, $pass) {
        return $item['login'] == $login && $item['password'] == md5($pass);
    });

    if ($filteredUsers) {
        saveToSession('user', current($filteredUsers));
    }
}

function userAuth(): void
{
    if (isUserGuest()) {
        header('WWW-Authenticate: Basic realm="Please log in"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'You has no more power here';
        exit;
    }
}