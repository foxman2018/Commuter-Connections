<?php

session_start();

$num = $_GET['connected_id'];
$id = $_SESSION['userid'];

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('db-connect.php');

$query = "DELETE FROM t_connections
          WHERE (connected_id ='".$num."' AND user_fk = '".$id."')
          OR (user_fk ='".$num."' AND connected_id = '".$id."')
          ";

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: connections.php");

?>
