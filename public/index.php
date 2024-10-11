<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "Core/functions.php";

spl_autoload_register(function ($class_name) {

    $class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);

    require base_path($class_name . '.php');
});


$router = new Core\Router();

$routes = require base_path("routes.php");

$uri = parse_url($_SERVER["REQUEST_URI"]);

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri["path"], $method);