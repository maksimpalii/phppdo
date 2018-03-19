<?php
$dsn = 'mysql:host=localhost;dbname=burger;charset=utf8';
$pdo = new PDO($dsn, 'root', '');

$request_uri = explode('/', $_SERVER['REQUEST_URI']);


//var_dump($request_uri);
if (count($request_uri) > 1) {
    switch ($request_uri[1]) {
        // Home page
        case '':
            require 'views/home.php';
            break;
        // About page
        case 'user':
            require 'views/user.php';
            break;
        case 'order':
            require 'views/order.php';
            break;
        // Everything else
        default:
            header('HTTP/1.0 404 Not Found');
            require 'views/404.php';
            break;
    }

} else {
    header('HTTP/1.0 404 Not Found');
    require 'views/404.php';
}

