<?php

setcookie('test', 123);
setcookie('test2', 234, time() + 30);
setcookie('test3', 345, time() + 300, '/test');
setcookie('test4', 456, time() + 300, '/', 'test.1003.local');
setcookie('test5', 567, time() + 300, '/', '1003.local', true);
setcookie('test6', 567, time() + 300, '/', '1003.local', false, true);

setcookie('test', null, time() - 100);

var_dump($_COOKIE);
