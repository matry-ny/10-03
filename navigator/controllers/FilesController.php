<?php

require_once __DIR__ . '/../models/Files.php';

function actionView()
{
    $file = $_GET['rout'];
    return render('files/view', [
        'name' => basename($file),
        'rout' => $file,
        'dir' => dirname($file),
        'content' => getFileContent($file)
    ]);
}

function actionUpload()
{
    if (isPostRequest()) {
        foreach (getUploadedFiles('file') as $file) {
//            if (mime_content_type($file['tmp_name']) !== 'text/plain') {
//                continue;
//            }

            $destination = "{$_GET['rout']}/{$file['name']}";
            move_uploaded_file($file['tmp_name'], $destination);
        }

        redirect("/?rout={$_GET['rout']}");
    }

    return render('files/upload');
}
