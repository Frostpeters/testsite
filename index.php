<?php

session_start();

define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/router.php');
require_once(ROOT . '/config/db.php');


$router = new router();
$router->run();
