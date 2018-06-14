<?php

session_start();

$userId = $_SESSION['userid'];

require_once('db-connect.php');

require_once('upload.php');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];

$query = 'UPDATE t_users SET `firstname`="'.$firstname.'", `lastname`="'.$lastname.'", `email`="'.$email.'", `phone`="'.$phone.'", `profileimage`="'.$image.'" WHERE `user_id`="'.$userId.'"';

$result = mysqli_query($link, $query);

$_SESSION['firstname'] = $firstname;

$_SESSION['lastname'] = $lastname;

$_SESSION['email'] = $email;

$_SESSION['phone'] = $phone;

$_SESSION['profile'] = $image;

mysqli_close($link);

header("Location: profile.php");

?>
