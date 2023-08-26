<?php

require_once("vendor/autoload.php");


use Omar\Scandi\core\Application;
use Omar\Scandi\controllers\ProductController;
use Omar\Scandi\controllers\HomeController;
$app = new Application(dirname(__DIR__));

$app->router->get('/product/create',[ProductController::class,'create']);
$app->router->get('/',[HomeController::class,'page']);

$app->router->post('/product/add',[ProductController::class,'add']);
$app->router->post('/product/getAttribute',[ProductController::class,'getAttribute']);
$app->router->post('/findAll',[HomeController::class,'findAll']);
$app->router->post('/delete',[HomeController::class,'delete']);


$app->run();

