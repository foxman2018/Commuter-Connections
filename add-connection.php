<?php

session_start();

$userId = $_SESSION['userid'];
$requestId = $_GET['request_id'];

require_once('db-connect.php');

$deleteQuery = "DELETE FROM `t_requests` WHERE `requested_id` = '".$requestId."' AND `user_id` = '".$userId."' OR `user_id` = '".$requestId."' AND `requested_id` = '".$userId."'";

$query = "INSERT INTO t_connections (user_fk, connected_id) VALUES ('".$userId."', '".$requestId."')";

mysqli_query($link, $query);

mysqli_query($link, $deleteQuery);

mysqli_close($link);

header("Location: connections.php");

?>
