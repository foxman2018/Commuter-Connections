<?php

session_start();

$userId = $_SESSION['userid'];
$recipientId = $_POST['recipient_id'];
$message = $_POST['message'];

require_once('db-connect.php');

$query = "INSERT INTO `t_messages` (`user_fk`, `recipient_id`, `message`, `time`) VALUES ('$userId', '$recipientId', '$message', NOW())";

$result = mysqli_query($link, $query);

mysqli_close($link);

header('location: connection-profile.php?user_id='.$recipientId.'');


?>
