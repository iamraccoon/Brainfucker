<?php

spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.php';
});


$fuck = new FuckCode();
$director = new Director($fuck);

$string = 'I am raccoon';
$code = $director->build($string);

echo $code;
