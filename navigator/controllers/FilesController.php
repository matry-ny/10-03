<?php

require_once __DIR__ . '/../models/Files.php';

function actionView()
{
    $file = $_GET['rout'];
    $type = mime_content_type($file);

    if (isImage($type)) {
        $content = "<img src='/files/render-active-content?rout={$file}' width='100%'/>";
    } elseif (isDownloadable($type)) {
        downloadFile($file);
    } elseif (isActive($type)) {
        $content = "<iframe src='/files/render-active-content?rout={$file}' width='100%' height='500px'></iframe>";
    } else {
        $content = nl2br(getFileContent($file));
    }

    return render('files/view', [
        'name' => basename($file),
        'rout' => $file,
        'dir' => dirname($file),
        'type' => $type,
        'content' => $content
    ]);
}

function actionRenderActiveContent()
{
    $file = $_GET['rout'];

    header('Content-Type: ' . mime_content_type($file));
    return getFileContent($file, false);
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
