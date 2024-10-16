<?php

use Core\DataBase;
use Core\App;

$db = App::resolve(DataBase::class);


$notes = $db->query("select * from notes")->findAll();

view('notes/index.view.php', [
    'header_title' => "My notes",
    'notes' => $notes
]);

