<?php


use Core\App;
use Core\DataBase;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'provide a valid email address';
}

if (!Validator::string($password)) {
    $errors['password'] = 'provide a valid password';
}

if (!empty($errors)) {
    view('session/create.view.php', ['errors' => $errors]);
}

$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $email
])->find();

if ($user) {
    if (password_verify($password, $user['password'])) {
        login($user);
        header('Location: /notes');
        exit();
    }
}


view('session/create.view.php', [
    'errors' => [
        'email' => 'No matching account for that email and password'
    ]]);