<?php

include_once 'components/AbstractBuilder.php';
include_once 'components/FuckCode.php';
include_once 'components/Director.php';

$fuck = new \components\FuckCode();
$director = new \components\Director($fuck);

$char = 'P';
$code = $director->build($char);

echo $code;
