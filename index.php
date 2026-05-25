<?php

require_once __DIR__ . '/app/Core/bootstrap.php';

use App\Core\Router;
use App\Controllers\NewsDetail;
use App\Controllers\Index;
use App\Core\Container;
use App\Core\Request;


require 'container.php';

$router = new Router();

$router->get('/', [Index::class, 'index']);
$router->get('/news', [NewsDetail::class, 'detail']);

$router->run();