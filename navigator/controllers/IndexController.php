<?php

require_once __DIR__ . '/../models/Files.php';

function actionIndex()
{
    $dir = realpath(isset($_GET['rout']) ? $_GET['rout'] : __DIR__);
    return render('index/index', [
        'dir' => $dir,
        'items' => filesList($dir)
    ]);
}
