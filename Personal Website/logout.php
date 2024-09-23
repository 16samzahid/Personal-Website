<?php

session_start();

$_SESSION['loggedIn'] = false;

//unset all session variables
session_unset();



//destroy the session
session_destroy();

//redirect to homepage
header("Location: homepage.html");
exit();

?>