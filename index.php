<?php

require_once __DIR__ . '/app/Core/bootstrap.php';

use app\Core\Router;

$router = new Router();

$router->get('/', 'app/Controllers/index.php');
$router->get('/news', 'app/Controllers/newsDetail.php');

$router->run();