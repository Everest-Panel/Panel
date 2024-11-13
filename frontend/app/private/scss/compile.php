#!/bin/php
<?php

require explode("/private", __DIR__)[0]."/private/api/resources/composer/vendor/autoload.php";

use ScssPhp\ScssPhp\Compiler;

// Gather All RAW files
$rawS = (scandir(__DIR__."/raw"));
$files = [];
foreach ($rawS as $obj) {
    $path = sprintf("%s/raw/%s", __DIR__, $obj);
    $isFile = is_file($path);
    switch ($isFile) {
        case ($obj == true):
            $files[] = $path;
            break;
    };
}

// Compile to new CSS
$c = new Compiler();
foreach ($files as $file) {
    $fileName = explode(".", basename($file))[0];
    try {
        $css = $c->compileFile($file);
    }
    catch (Exception | Error $e) {
        echo $e->getMessage();
    }
    $path = sprintf("%s/dump/styles/%s.css", explode("/scss", __DIR__)[0], $fileName);
    $cssFile = fopen($path, "w");
    fwrite($cssFile, $css->getCss());
    fclose($cssFile);
}

