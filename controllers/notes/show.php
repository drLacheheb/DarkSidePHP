<?php

use Core\DataBase;

$config = require base_path("config.php");
$db = new DataBase($config);

$currentUser = 1;

$note = $db->query("select * from notes where id = :id", [
    'id' => $_GET["id"]
])->findOrFail();

authorize($note['user_id'] === $currentUser);


view('notes/show.view.php', [
    'header_title' => "Note",
    'note' => $note
]);