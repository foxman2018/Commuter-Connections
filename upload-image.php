<?php

session_start();

$image = $_POST['uploadedFile'];

require_once('db-connect.php');

require_once('upload.php');

$query = "INSERT INTO `t_users` (`profileimage`) VALUES ('$image') WHERE `user_id`='".$userId."'";

$result = mysqli_query($link, $query);

$_SESSION['profile'] = $image;

mysqli_close($link);

header("Location: profile.php");

?>
