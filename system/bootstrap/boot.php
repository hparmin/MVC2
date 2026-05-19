<?php
ob_start();
session_start();
include_once 'system/config.php';
include_once 'system/bootstrap/autoload.php';
$autoload = new \system\bootstrap\autoload();
$autoload -> myautoload();

$router = new system\router\Routing();
$router -> run();
