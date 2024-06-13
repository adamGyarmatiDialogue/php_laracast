<?php

$db = App::resolve("Database");

$heading = 'My Notes';

$notes = $db->query("select * from notes where user_id = 2")->get();

require 'views/notes/index.view.php';
