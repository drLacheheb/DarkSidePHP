<?php

use Core\DataBase;
use Core\App;

$db = App::resolve(DataBase::class);

$currentUser = 1;

$note = $db->query("select * from notes where id = :id", [
    'id' => $_GET["id"]
])->findOrFail();

authorize($note['user_id'] === $currentUser);

view('notes/edit.view.php', [
    'header_title' => "Edit Note",
    'note' => $note
]);

