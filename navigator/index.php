<?php

require_once __DIR__ . '/helpers/strings.php';
require_once __DIR__ . '/helpers/sessions.php';
require_once __DIR__ . '/helpers/requests.php';
require_once __DIR__ . '/helpers/files.php';
require_once __DIR__ . '/helpers/users.php';
require_once __DIR__ . '/components/view.php';
require_once __DIR__ . '/components/app.php';

$config = require_once __DIR__ . '/configs/main.php';
echo runApplication($config);
