<?php
 
define('ROOT', dirname(__FILE__));
 require_once (ROOT . '/components/Router.php');
 require_once 'view/index.html';
 

$router = new Router();
$router->run();

