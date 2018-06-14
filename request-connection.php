<?php

session_start();

$userId = $_SESSION['userid'];
$reqId = $_GET['requested_id'];

require_once('db-connect.php');

$query = "INSERT INTO `t_requests` (`user_id`, `requested_id`) VALUES ('$userId', '$reqId')";

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: add-connections.php");

?>
