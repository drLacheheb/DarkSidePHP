<?php

$router->get("/", "home.php");
$router->get("/about", "about.php");
$router->get("/contact", "contact.php");

$router->get('/notes', 'notes/index.php')->only('auth');
$router->get('/note', 'notes/show.php');

$router->get('/note/create', 'notes/create.php');
$router->post('/note/create', 'notes/store.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note/edit', 'notes/update.php');

$router->delete('/note', 'notes/destroy.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');