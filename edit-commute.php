<?php

session_start();

$userId = $_SESSION['userid'];

require_once('db-connect.php');

$start = $_POST['start'];
$destination = $_POST['destination'];
$morningTime = $_POST['morningtime'];
$eveningTime = $_POST['eveningtime'];

$query = 'UPDATE t_users SET `startlocation`="'.$start.'", `destination`="'.$destination.'", `morningtime`="'.$morningTime.'", `eveningtime`="'.$eveningTime.'" WHERE `user_id`="'.$userId.'"';

$result = mysqli_query($link, $query);

$_SESSION['morning'] = $morningTime;

$_SESSION['evening'] = $eveningTime;

$_SESSION['start'] = $start;

$_SESSION['destination'] = $destination;

mysqli_close($link);

header("Location: profile.php");

?>
