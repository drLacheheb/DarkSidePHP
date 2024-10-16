<?php

use Core\DataBase;
use Core\App;
use Core\Validator;

$errors = [];

$db = App::resolve(DataBase::class);


if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'body of not more than 1000 characters is required';
}
if (!empty($errors)) {

    view('notes/create.view.php', [
        'header_title' => "New Note",
        'errors' => $errors,
        'body' => $_POST['body']
    ]);

    exit();
}

$db->query("INSERT INTO lara_blog.notes (body, user_id) VALUES (:body, :user_id)", [
    'body' => htmlspecialchars($_POST['body']),
    'user_id' => 1
]);

header('location: /notes');