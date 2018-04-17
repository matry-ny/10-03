<?php

require_once __DIR__ . '/../models/Directories.php';

function actionCreate()
{
    if (isPostRequest()) {
        createNewDirectory($_GET['rout'], $_POST['name']);
        redirect("/?rout={$_GET['rout']}/{$_POST['name']}");
    }

    return render('directories/create');
}
