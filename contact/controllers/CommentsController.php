<?php

require_once __DIR__ . '/../models/Comments.php';

function actionList()
{
    return render('contacts/list', ['comments' => getCommentsList()]);
}

function actionCreate()
{
    saveComment($_POST);
    redirect('/comments/list');
}
