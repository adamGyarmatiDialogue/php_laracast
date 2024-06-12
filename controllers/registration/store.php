<?php

require "Validator.php";
require "functions.php";

$email = $_POST["email"];
$password = $_POST["password"];

// validate form inputs
$errors = [];
if (!Validator::email($email)) {
	$errors["email"] = "Please provide a valid email address.";
}

if (!Validator::string($password, 7, 255)) {
	$errors["password"] = "Please provide a password atleast 7 character";
}

if (!empty($errors)) {
	require "views/registration/create.view.php";
	die();
}

$db = App::resolve("Database");

// check if the account already exist
$user = $db->query("select * from users where email = :email", [
	"email" => $email
])->find();


if ($user) {
	// if yes, redirect to a login page
	header("location: /phppracticexampp/");
} else {
	// if not, save the user and redirect
	$db->query("insert into users(email, password) values (:email, :password)", [
		"email" => $email,
		"password" => password_hash($password, PASSWORD_BCRYPT),
	]);

	// mark that the user has logged in
	login([
		"email" => $email
	]);

	header("location: /phppracticexampp/");
	exit();
}
