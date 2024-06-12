<?php

require "Validator.php";


$db = App::resolve("Database");
$email = $_POST["email"];
$password = $_POST["password"];
$errors = [];

if (!Validator::email($email)) {
	$errors["email"] = "Please provide a valid email address.";
}

if (!Validator::string($password)) {
	$errors["password"] = "Please provide a password";
}

if (!empty($errors)) {
	require "views/sessions/create.view.php";
	die();
}


// match the credentials
$user = $db->query("select * from users where email = :email", [
	"email" => $email
])->find();


if ($user) {
	if (password_verify($password, $user["password"])) {
		login([
			"email" => $email
		]);

		header("location: /phppracticexampp/");
		exit();
	}
}


$errors = ["password" => "No matching account found for that email or password."];
require "views/sessions/create.view.php";
die();
