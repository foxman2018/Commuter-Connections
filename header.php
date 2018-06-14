<html>
<head>
<title>Coco Dashboard</title>
<meta name="viewport" content="width=500, user-scalable=0" />
<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

<?php

session_start();

$userId = $_SESSION['userid'];
$morningTime = $_SESSION['morning'];
$eveningTime = $_SESSION['evening'];
$startLocation = $_SESSION['start'];
$destination = $_SESSION['destination'];
$result[] = $_SESSION['username'];

require_once('db-connect.php');

?>

</head>

<body>

  <div class="opacity-screen"></div>

  <div class="top-bar">

    <div class="nav-slide">

      <i class="fa fa-bars" aria-hidden="true"></i>

    </div>

    <div class="logo-dash">

      <svg id="logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.29 121.04"><defs><style>.fill{fill:#fff;}</style></defs><title>Untitled-3</title><path class="fill" d="M267.36,362.95A20.67,20.67,0,1,0,288,383.62,20.67,20.67,0,0,0,267.36,362.95Zm0,33.66a13,13,0,1,1,13-13A13,13,0,0,1,267.36,396.61Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M364.27,363.6a20.67,20.67,0,1,0,20.67,20.67A20.67,20.67,0,0,0,364.27,363.6Zm0,33.66a13,13,0,1,1,13-13A13,13,0,0,1,364.27,397.27Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M232.75,391a13,13,0,1,1,0-15.5l5.46-5.46a20.67,20.67,0,1,0,0,26.42Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M329.15,391.69a13,13,0,1,1,0-15.5l5.46-5.46a20.67,20.67,0,1,0,0,26.42Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M343.61,360.65a7.27,7.27,0,0,1-6-11.37,55.69,55.69,0,0,0-91.51,4.1h-5.5a60.44,60.44,0,0,1,100.81-6.93A7.27,7.27,0,1,1,343.61,360.65Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M246.7,408.7a7.26,7.26,0,0,1,5.48,12A55.7,55.7,0,0,0,338.34,416h5.73A60.39,60.39,0,0,1,248,423.12,7.27,7.27,0,1,1,246.7,408.7Z" transform="translate(-201.65 -322.57)"/></svg>

    </div>

    <div class="note-slide">

      <i class="fa fa-bell" aria-hidden="true"></i>

    </div>

  </div>

  <div class="bottom-slope">

    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 612 48.35"><defs><style>.backBg{fill:#A293C7;}</style></defs><title>Untitled-5</title><polygon class="backBg" points="612 2.19 0 48.35 0 0 612 0 612 2.19"/></svg>

  </div>

<?php include 'navbar.php'; ?>

<?php include 'notifications.php'; ?>
