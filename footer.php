<div class="footer">

  <div class="logo-footer">

    <svg id="logo" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 183.29 121.04"><defs><style>.cls-1{fill:#A293C7;}</style></defs><title>Untitled-3</title><path class="cls-1" d="M267.36,362.95A20.67,20.67,0,1,0,288,383.62,20.67,20.67,0,0,0,267.36,362.95Zm0,33.66a13,13,0,1,1,13-13A13,13,0,0,1,267.36,396.61Z" transform="translate(-201.65 -322.57)"/><path class="cls-1" d="M364.27,363.6a20.67,20.67,0,1,0,20.67,20.67A20.67,20.67,0,0,0,364.27,363.6Zm0,33.66a13,13,0,1,1,13-13A13,13,0,0,1,364.27,397.27Z" transform="translate(-201.65 -322.57)"/><path class="cls-1" d="M232.75,391a13,13,0,1,1,0-15.5l5.46-5.46a20.67,20.67,0,1,0,0,26.42Z" transform="translate(-201.65 -322.57)"/><path class="cls-1" d="M329.15,391.69a13,13,0,1,1,0-15.5l5.46-5.46a20.67,20.67,0,1,0,0,26.42Z" transform="translate(-201.65 -322.57)"/><path class="cls-1" d="M343.61,360.65a7.27,7.27,0,0,1-6-11.37,55.69,55.69,0,0,0-91.51,4.1h-5.5a60.44,60.44,0,0,1,100.81-6.93A7.27,7.27,0,1,1,343.61,360.65Z" transform="translate(-201.65 -322.57)"/><path class="cls-1" d="M246.7,408.7a7.26,7.26,0,0,1,5.48,12A55.7,55.7,0,0,0,338.34,416h5.73A60.39,60.39,0,0,1,248,423.12,7.27,7.27,0,1,1,246.7,408.7Z" transform="translate(-201.65 -322.57)"/></svg>

  </div>

  <div class="social-footer">

    <i class="fa fa-facebook"></i>
    <i class="fa fa-twitter"></i>
    <i class="fa fa-google-plus"></i>

  </div>

</div>

<?php include 'pop-up.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

<script>

  $(function() {
     var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/")+1);

     $(".nav-tab").each(function(){
          if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
          $(this).addClass("active");
     })
  });

  $( "#sign-out" ).click(function() {
    $( ".sign-out-box" ).addClass( "block-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".cancel, .send" ).click(function() {
    $( ".sign-out-box" ).removeClass( "block-shown" );
    $( ".opacity-screen" ).removeClass( "display" );
  });

  $( ".x-cancel" ).click(function() {
    $( ".connections-box" ).removeClass( "reply-shown" );
    $( ".opacity-screen" ).removeClass( "display" );
  });

  $( ".note-slide" ).click(function() {
    $( ".note-panel" ).addClass( "shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".nav-slide" ).click(function() {
    $( ".navbar" ).addClass( "nav-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".password" ).click(function() {
    $( ".password-box" ).addClass( "reply-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".message-button" ).click(function() {

    var $messageId = $(this).attr('rel');

    $(".reply-box .hidden-input").attr("value", $messageId);
    $( ".reply-box" ).addClass( "reply-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".block" ).click(function() {

    var $addLink = $(this).attr('rel');

    $(".block-box .send").attr("href", $addLink);
    $( ".block-box" ).addClass( "block-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".addcon" ).click(function() {

    var $reqLink = $(this).attr('rel');

    $(".add-box .send").attr("href", $reqLink);
    $( ".add-box" ).addClass( "block-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".accept" ).click(function() {

    var $acceptLink = $(this).attr('rel');

    $(".accept-box .send").attr("href", $acceptLink);
    $( ".accept-box" ).addClass( "block-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".edit-details" ).click(function() {
    $( ".details-box" ).addClass( "reply-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".edit-commute" ).click(function() {
    $( ".commute-box" ).addClass( "reply-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".cancel, .send" ).click(function() {
    $( ".reply-box" ).removeClass( "reply-shown" );
    $( ".password-box" ).removeClass( "reply-shown" );
    $( ".sign-out-box" ).removeClass( "reply-shown" );
    $( ".quick-reply-box" ).removeClass( "reply-shown" );
    $( ".block-box" ).removeClass( "block-shown" );
    $( ".accept-box" ).removeClass( "block-shown" );
    $( ".details-box" ).removeClass( "reply-shown" );
    $( ".commute-box" ).removeClass( "reply-shown" );
    $( ".add-box" ).removeClass( "block-shown" );
    $( ".opacity-screen" ).removeClass( "display" );
  });

  $( ".opacity-screen" ).click(function() {
    $( ".navbar" ).removeClass( "nav-shown" );
    $( ".note-panel" ).removeClass( "shown" );
    $( ".reply-box" ).removeClass( "reply-shown" );
    $( ".password-box" ).removeClass( "reply-shown" );
    $( ".sign-out-box" ).removeClass( "reply-shown" );
    $( ".quick-reply-box" ).removeClass( "reply-shown" );
    $( ".block-box" ).removeClass( "block-shown" );
    $( ".accept-box" ).removeClass( "block-shown" );
    $( ".details-box" ).removeClass( "reply-shown" );
    $( ".commute-box" ).removeClass( "reply-shown" );
    $( ".add-box" ).removeClass( "block-shown" );
    $( ".opacity-screen" ).removeClass( "display" );
  });

  $( ".info-box-button" ).click(function() {
    $( ".intro-box" ).addClass( "reply-shown" );
    $( ".navbar" ).removeClass( "nav-shown" );
    $( ".opacity-screen" ).addClass( "display" );
  });

  $( ".close-intro" ).click(function() {
    $( ".intro-box" ).removeClass( "reply-shown" );
    $( ".opacity-screen" ).removeClass( "display" );
  });

  // Intro Slider

  $('.slideshow .slide:gt(0)').hide();

  $('#next').click(function() {
      $('.slideshow .slide:first-child').fadeOut().next().fadeIn().end().appendTo('.slideshow');
  });

  $('#prev').click(function() {
      $('.slideshow .slide:first-child').fadeOut();
      $('.slideshow .slide:last-child').prependTo('.slideshow').fadeOut();
      $('.slideshow .slide:first-child').fadeIn();
  });


</script>

<?php if ($_SESSION['morning'] == NULL) {

   if (!isset($_SESSION['function_ran'])) {  ?>

<script>

  $(function() {

    setTimeout(function() {
      $( ".intro-box" ).addClass( "reply-shown" );
      $( ".opacity-screen" ).addClass( "display" );
    }, 400);

  });

</script>

  <?php $_SESSION['function_ran'] = true; }

 } ?>

</body>

</html>
