<?php

session_start();

if (empty($_POST['username']) || empty($_POST['password'])) {

  header("location: index.php");

} else {

  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once('db-connect.php');

  // Secure username and password

  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $query = "SELECT * FROM `t_users` WHERE (`username` = '$username' OR `email` = '$username' ) AND `password` = '$password'";

  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  // Store session variables

  $_SESSION['username'] = $row['username'];

  $_SESSION['userid'] = $row['user_id'];

  $_SESSION['firstname'] = $row['firstname'];

  $_SESSION['lastname'] = $row['lastname'];

  $_SESSION['email'] = $row['email'];

  $_SESSION['phone'] = $row['phone'];

  $_SESSION['profile'] = $row['profileimage'];

  $_SESSION['morning'] = $row['morningtime'];

  $_SESSION['evening'] = $row['eveningtime'];

  $_SESSION['start'] = $row['startlocation'];

  $_SESSION['destination'] = $row['destination'];

  $_SESSION['account-created'] = $row['account-created'];

  if ($password == $row['password']) {

    header("location: connections.php");

    } else {

    header("location: index.php");

  }

}

?>
