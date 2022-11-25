<?php

require_once "vendor/autoload.php";

$city = $_POST['city'] ?? 'Riga';

$dispatcher = FastRoute\simpleDispatcher(function (FastRoute\RouteCollector $route) {
    $route->addRoute(['GET','POST'], '/', 'Riga');
    $route->addRoute(['GET','POST'], '/Riga', 'Riga');
    $route->addRoute(['GET','POST'], '/Tallinn', 'Tallinn');
    $route->addRoute(['GET','POST'], '/Vilnius', 'Vilnius');
});

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        $controller2 = 'App\Controllers\ApiControllers';
        $weather = (new $controller2())->getData($city);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        $controller = 'App\Controllers\TimeControllers';
        $controller2 = 'App\Controllers\ApiControllers';
        $time = (new $controller())->getData($handler);
        $weather = (new $controller2())->getData($city);
        include 'views/index.php';
        break;
}
