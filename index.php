<?php

include_once 'components/AbstractBuilder.php';
include_once 'components/FuckCode.php';
include_once 'components/Director.php';

$fuck = new \components\FuckCode();
$director = new \components\Director($fuck);

$string = 'I am raccoon';
$code = $director->build($string);

echo $code;
