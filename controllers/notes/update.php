<?php

use Core\DataBase;
use Core\App;
use Core\Validator;

$errors = [];

$db = App::resolve(DataBase::class);

$currentUser = 1;

$note = $db->query("select * from notes where id = :id", [
    'id' => $_POST["id"]
])->findOrFail();

authorize($note['user_id'] === $currentUser);

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

$db->query("UPDATE notes SET body = :body WHERE id = :id;", [
    'body' => htmlspecialchars($_POST['body']),
    'id' => $note['id']
]);

header("location: /note?id={$note['id']}");