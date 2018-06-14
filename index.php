<?php session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

?>

<html>
<head>
<title>Welcome to Coco</title>
<meta name="viewport" content="width=500; user-scalable=0;" />
<link href='https://fonts.googleapis.com/css?family=Oswald:300' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body>

<div class="background-layer">

    <div class="background-image">

      <div class="sky">
      </div>

      <div class="country">
      </div>

      <div class="car">
        <img id="car" src="img/car-purple-night.png" />
      </div>

    </div>

</div>

<div class="home-left">

  <div class="left-background">

  </div>

  <div class="left-slope">

    <svg id="slope" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 223.49 792"><defs><style>.car{fill:#A293C7;}</style></defs><title>Untitled-2</title><polygon class="car" points="0 0 223.49 0 84.39 792 0 792 0 0"/></svg>

  </div>

</div>

<div class="foreground-layer">

  <div class="foreground-container">

    <div class="logo">

      <svg id="logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.29 121.04"><defs><style>.fill{fill:#fff;}</style></defs><title>Untitled-3</title><path class="fill" d="M267.36,362.95A20.67,20.67,0,1,0,288,383.62,20.67,20.67,0,0,0,267.36,362.95Zm0,33.66a13,13,0,1,1,13-13A13,13,0,0,1,267.36,396.61Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M364.27,363.6a20.67,20.67,0,1,0,20.67,20.67A20.67,20.67,0,0,0,364.27,363.6Zm0,33.66a13,13,0,1,1,13-13A13,13,0,0,1,364.27,397.27Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M232.75,391a13,13,0,1,1,0-15.5l5.46-5.46a20.67,20.67,0,1,0,0,26.42Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M329.15,391.69a13,13,0,1,1,0-15.5l5.46-5.46a20.67,20.67,0,1,0,0,26.42Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M343.61,360.65a7.27,7.27,0,0,1-6-11.37,55.69,55.69,0,0,0-91.51,4.1h-5.5a60.44,60.44,0,0,1,100.81-6.93A7.27,7.27,0,1,1,343.61,360.65Z" transform="translate(-201.65 -322.57)"/><path class="fill" d="M246.7,408.7a7.26,7.26,0,0,1,5.48,12A55.7,55.7,0,0,0,338.34,416h5.73A60.39,60.39,0,0,1,248,423.12,7.27,7.27,0,1,1,246.7,408.7Z" transform="translate(-201.65 -322.57)"/></svg>

    </div>

    <div class="home-title">

      <div class="divider"></div>

      <h1><span>Co</span>mmuter<br/><span>Co</span>nnections</h1>

      <div class="divider"></div>

    </div>

    <p class="home-text">Commuter Connections is a secure online communication platform that allows commuters who travel similar routes daily to connect with each other to organise commuting arrangements.</p>

  </div>

</div>

<div class="sign-in-box">

  <div class="sign-in-left">

    <div class="sign-in-buttons">

      <a id="signin" class="button white">Sign In</a>
      <a href="about.php" class="button white">Sign Up</a>

    </div>

    <div class="social">

      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-google-plus"></i>

    </div>

  </div>

  <div class="sign-in-right">

    <div class="sign-in-form">

      <form method="post" action="sign-in.php">

        <input style="display:none" type="text" name="fakeusernameremembered"/>
        <input style="display:none" type="password" name="fakepasswordremembered"/>

        <input type="text" name="username" placeholder="USERNAME OR EMAIL" value="mark@coco.ie"><br/>
        <input type="password" name="password" placeholder="PASSWORD" value="password">

        <input type="submit" class="button submit white" value="Go &#8594;">

        <span class="panel-back">cancel<br/><i class="fa fa-long-arrow-left"></i></span>

      </form>

    </div>

  </div>

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<script>

$(document).ready(function() {

  $( "#signin" ).click(function() {

    $(".sign-in-right").css({
       transform: 'translateX(-500px)',
       MozTransform: 'translateX(-500px)',
       WebkitTransform: 'translateX(-500px)',
       msTransform: 'translateX(-500px)'
     });

  });

  $( ".panel-back" ).click(function() {

    $(".sign-in-right").css({
       transform: 'translateX(0px)',
       MozTransform: 'translateX(0px)',
       WebkitTransform: 'translateX(0px)',
       msTransform: 'translateX(0px)'
     });

   });

   if ($( window ).width() < 960) {

    var windowWidth = $( window ).width();

    $( "#signin" ).click(function() {

      $(".sign-in-right").css({
         transform: 'translateX(-'+ windowWidth +'px)',
         MozTransform: 'translateX(-'+ windowWidth +'px)',
         WebkitTransform: 'translateX(-'+ windowWidth +'px)',
         msTransform: 'translateX(-'+ windowWidth +'px)'
       });

     });

     $( ".panel-back" ).click(function() {

      $(".sign-in-right").css({
         transform: 'translateX(0px)',
         MozTransform: 'translateX(0px)',
         WebkitTransform: 'translateX(0px)',
         msTransform: 'translateX(0px)'
       });

     });

   }

 });

</script>

<script>

$(document).ready(function() {

  if ($(window).width() > 700) {

    var dt = new Date();
    var time = dt.getHours();

    if (time < 20 && time > 8) {

        $('.background-image').css('background-color', '#fff');
        $('.sky').removeClass('sky').addClass('sky-day');
        $('.country').removeClass('country').addClass('country-day');
        $('#car').attr("src", "img/car-purple.png");
        $('#car').css({"width" : "90px", "height": "50px", "right": "40%"});
        $('.logo .fill').css("fill", "black");

    }

  }

 });

 </script>

</body>

</html>
