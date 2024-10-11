<?php

use Core\DataBase;

$config = require base_path("config.php");

$db = new DataBase($config);

$notes = $db->query("select * from notes")->findAll();

view('notes/index.view.php', [
    'header_title' => "My notes",
    'notes' => $notes
]);

