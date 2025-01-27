<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function urlIs($value): bool
{
    return $_SERVER["REQUEST_URI"] === $value;
}

function abort($code = Response::NOT_FOUND): void
{
    http_response_code($code);

    require base_path("controllers/error.php");

    die();
}

function authorize($condition, $status = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path): string

{
    return BASE_PATH . $path;
}

function view($path, $attributes = []): void
{
    extract($attributes);
    require base_path('views/' . $path);
}

function login($user): void
{
    $_SESSION['user'] = [
        'email' => $user['email']
    ];
    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();

    $prams = session_get_cookie_params();

    setcookie('PHPSESSID', '', time() - 3600, $prams['path'], $prams['domain'], $prams['secure'], $prams['httponly']);

}