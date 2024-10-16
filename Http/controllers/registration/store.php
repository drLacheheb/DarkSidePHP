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

if (!Validator::string($password, 7, 224)) {
    $errors['password'] = 'provide a valid password that at least 7 characters long';
}

if (!empty($errors)) {
    view('registration/create.view.php', ['errors' => $errors]);
}

$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $email
])->find();
if ($user) {
    header('Location: /login');
    exit();
} else {

    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        ':email' => $email,
        ':password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
}

login([
    'email' => $email
]);

header('Location: /notes');
exit();