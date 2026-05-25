<?php

use App\Core\Container;
use App\Core\Request;

$container = new Container();

$container->bind(Request::class, function() {
    return new Request();
});
