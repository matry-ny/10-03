<?php

function actionLogout()
{
    dropSession();
    redirect('http://logout:logout@' . $_SERVER['HTTP_HOST']);
}
