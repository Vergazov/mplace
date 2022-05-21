<?php
 
define('ROOT', dirname(__FILE__));
 require_once (ROOT . '/components/Router.php');
 require_once 'view/index.html';
 require_once 'lib.php';
 

$router = new Router();
$router->run();

$method = $_SERVER['REQUEST_METHOD'];
$path = '/api/moysklad/vendor/1.0/apps/a27b18e6-2cb4-4527-907e-44d5e8a29aa8/247868fe-d753-11ec-0a80-03bc000031ed';

$pp = explode('/', $path);
$n = count($pp);
$appId = $pp[$n - 2];
$accountId = $pp[$n - 1];

loginfo("MOYSKLAD => APP", "Received: method=$method, path=$path");

$app = AppInstance::load($appId, $accountId);
//var_dump($app->buildFilename($appId, $accountId));
//print_r($app);
//$res = $app->getStatusName();
//var_dump($res);

//$requestBody = file_get_contents('php://input');
//var_dump($requestBody);

$result = serialize($app);
var_dump($result);

$res = unserialize($result);
var_dump($res);







