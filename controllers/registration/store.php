<?php

use Core\App;
use Core\DataBase;
use Core\Validator;

$db = App::resolve(Database::class);
$errors = [];

if(!Validator::email($_POST['email'])){
    $errors['email'] = 'provide a valid email address';
}
if(!Validator::string($_POST['password'],7,224)){
    $errors['password'] = 'provide a valid password that at least 7 characters long';
}
if(!empty($errors)){
    view('registration/create.view.php', ['errors' => $errors]);
}

$user = $db->query("SELECT * FROM users WHERE email = :email", [
    ':email' => $_POST['email']
]);

if ($user){

    header('Location: /registration');
    exit();
}else{

    $db->query("INSERT INTO users (email, password) VALUES (:email, :password)", [
        ':email' => $_POST['email'],
        ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);
}

$_SESSION['email'] = $_POST['email'];

header('Location: /');
exit();