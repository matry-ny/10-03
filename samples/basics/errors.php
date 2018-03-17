<?php

// E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED
error_reporting(E_ALL);

var_dump($test);
include 'test.php';
require 'test.php';

echo 1;

