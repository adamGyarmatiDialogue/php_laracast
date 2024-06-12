<?php

require "Validator.php";

$heading = "Create note";
$db = App::resolve("Database");
$errors = [];


if (!Validator::string($_POST["body"], 1, 20)) {
	$errors["body"] = "A body of no more than 20 characters is required.";
}

if (!empty($errors)) {
	// TODO: Validation issue
	require "views/notes/create.view.php";
	die();
}


$db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
	"body" => $_POST["body"],
	"user_id" => 2
]);

header("location: /phppracticexampp/notes");
exit();
