<?php


require "Authenticator.php";
require "http\\forms\LoginForm.php";


$email = $_POST["email"];
$password = $_POST["password"];


$form = LoginForm::validate([
	"email" => $email,
	"password" => $password,
]);


$singedIn = (new Authenticator)->attempt($email, $password);


if (!$singedIn) {
	$form->error("email", "No matching account found for that email or password.")
		->throw();
}

redirect("/phppracticexampp/");
