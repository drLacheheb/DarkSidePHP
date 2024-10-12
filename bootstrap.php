<?php

use Core\DataBase;
use Core\Container;
use Core\App;

$container = new Container();

$container->bind('Core\DataBase', function () {
    $config = require base_path("config.php");

    return new DataBase($config);
});

App::setContainer($container);