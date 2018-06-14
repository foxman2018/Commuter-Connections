
<?php

session_start();

if (isset($_SESSION['userid'])) {


include 'header.php';

$recipientId = $_GET['user_id'];
$userId = $_SESSION['userid'];

$userResult = mysqli_query($link, "
  SELECT
    *
  FROM
    t_users
  WHERE
    (user_id = '".$recipientId."')
  ");

$row = mysqli_fetch_array($userResult);

$recipientImage = $row['profileimage'];

$recipientName = $row['firstname'];

$blockLink = 'block-connection.php?connected_id='.$recipientId.'';

?>

<div class="container">

  <div class="profile-box">

    <div class="profile-pic">

      <?php echo '<img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$recipientImage.'" />'; ?>

      <div class="profile-pic-overlay"></div>

    </div>

    <div class="con-profile">

      <h1><?php echo $row['username']; ?></h1>
      <div class="divider-green"></div>
      <p class="con-profile-text">Start Location : <?php echo $row['startlocation']; ?></p>
      <p class="con-profile-text">Destination : <?php echo $row['destination']; ?></p>
      <p class="con-profile-text">Starts Morning Commute : <?php echo $row['morningtime']; ?></p>
      <p class="con-profile-text">Starts Evening Commute : <?php echo $row['eveningtime']; ?></p>

      <div class="con-profile-header-buttons">

        <a rel="<?php echo $blockLink; ?>" class="button white right block">block</a>

      </div>

    </div>

  </div>

    <div class="connection-box-title">
      <h3>message timeline</h3>
    </div>

    <?php

    include_once('db-connect.php');

    $messageResult = mysqli_query($link, "
      SELECT
        *
      FROM
        t_messages
      WHERE
        (user_fk = '".$userId."' AND recipient_id = '".$recipientId."') OR
        (user_fk = '".$recipientId."' AND recipient_id = '".$userId."')
        ORDER BY message_id DESC
      ");

      ?>

    <div class="profile-buttons">

      <?php

      if ( mysqli_num_rows($messageResult) == 0) {

      echo '<a rel="'.$recipientId.'" class="button message-button right">Send Message</a>';

      } else {

      echo '<a rel="'.$recipientId.'" class="button message-button right">Reply</a>';

      } ?>

    </div>

    <div class="message-container">

    <?php

    if ( mysqli_num_rows($messageResult) == 0) {

    echo '<i>No messages yet...</i>';

    } else {

    while($row = mysqli_fetch_array($messageResult)) {

        if ($row['user_fk'] == $userId) {

          ?>

          <div class="message-box msg"><div class="message">

          <div class="message-profile-pic"><img src="<?php echo dirname($_SERVER['PHP_SELF']).'/uploads/'.$_SESSION['profile']; ?>" /></div>

          <div class="message-text"><p class="message-time"><i>message sent : <strong><?php echo date('d / m / Y @ H:i ', strtotime($row['time'])); ?></strong></i></p>

          <div class="message-point"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121.21 91"><defs><style>.fill-left{fill:#A293C7;}</style></defs><title>point</title><polygon class="fill-left" points="121.21 0 121.21 91 0 0.06 121.21 0"/></svg></div>

          <p class="message-bubble"> <?php echo $row['message']; ?> </p></div></div></div>

          <?php

        } else {

          ?>

          <div class="message-box-right msg"><div class="message-right">

          <div class="profile-pic"><img src="<?php echo dirname($_SERVER['PHP_SELF']).'/uploads/'.$recipientImage; ?>" /></div>

          <div class="message-text-right"><p class="message-time-right"><i>message sent : <strong><?php echo date('d / m / Y @ H:i ', strtotime($row['time'])); ?></strong></i></p>

          <div class="message-point-right"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121.21 91"><defs><style>.fill-right{fill:#7B66AD;}</style></defs><title>Untitled-1</title><polygon class="fill-right" points="0 0 0 91 121.21 0.06 0 0"/></svg></div>

          <p class="message-bubble-right"><?php echo $row['message']; ?></p></div></div></div>

          <?php } } } ?>

    </div>

    <?php

    mysqli_close($link);

    ?>


    <?php include 'footer.php';

    } else {

      header('Location: index.php');

    }

    ?>
