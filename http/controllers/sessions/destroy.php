<?php

require "Authenticator.php";


(new Authenticator)->logout();


header("location: /phppracticexampp/");
exit();
