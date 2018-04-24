<?php

ob_start();
echo 123;
$tmp = ob_get_contents();
echo 3131;
echo 3333333;
$tmp2 = ob_get_clean();

var_dump($tmp, $tmp2);

