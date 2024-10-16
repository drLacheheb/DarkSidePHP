<?php

use Core\DataBase;
use Core\App;

$db = App::resolve(DataBase::class);

$currentUser = 1;

$note = $db->query("select * from notes where id = :id", [
    'id' => $_POST["id"]
])->findOrFail();

authorize($note['user_id'] === $currentUser);

$db->query("DELETE FROM notes WHERE id = :id", [
    'id' => $note['id']
]);

header('location: /notes');

exit();