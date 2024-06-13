<?php


require "Authenticator.php";
require "http\\forms\LoginForm.php";


$email = $_POST["email"];
$password = $_POST["password"];

$form = new LoginForm();

if ($form->validate($email, $password)) {
	if ((new Authenticator)->attempt($email, $password)) {
		redirect("/phppracticexampp/");
	}
	$form->error("password", "No matching account found for that email or password.");
}


Session::flash("errors",  $form->errors());
Session::flash("old",  [
	"email" => $email
]);


redirect("/phppracticexampp/login");
