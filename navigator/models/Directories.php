<?php

function createNewDirectory(string $rout, string $name)
{
    $dir = "{$rout}/{$name}";
    if (file_exists($dir)) {
        $counter = 1;
        $tmpDir = $dir;
        do {
            $dir = "{$tmpDir}_{$counter}";
            $counter++;
        } while (file_exists($dir));
    }
    mkdir($dir);
}
