<?php

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];

require_once('db-connect.php');

$query = "INSERT INTO `t_users` (`username`, `password`, `email`, `firstname`, `lastname`, `profileimage`, `account-created`) VALUES ('$username', '$password', '$email', '$firstname', '$lastname', 'profile1.jpg', NOW())";

$result = mysqli_query($link, $query);

mysqli_close($link);

header('location: index.php');

?>
