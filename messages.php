
<?php

session_start();

if (isset($_SESSION['userid'])) {

error_reporting(E_ALL);
ini_set('display_errors', 'on');

include('header.php');

$recipientId = $_GET['user_id'];
$userId = $_SESSION['userid'];

include_once('db-connect.php');

$userResult = mysqli_query($link, "
  SELECT
    *
  FROM
    t_users
  WHERE
    (user_id = '$recipientId')
  ");

while($rows = mysqli_fetch_array($userResult)){

  $recipientUsername = $rows['username'];
  $recipientProfile = $rows['profileimage'];

}

?>

<div class="container-dash">

  <div class="opacity-screen"></div>

  <div class="inbox-header">

    <p><?php echo $recipientUsername; ?></p>

    <a rel="<?php echo $recipientId; ?>" id="reply" class="button message-button right">Reply</a>

  </div>

<?php

include_once('db-connect.php');

$messageResult = mysqli_query($link, "
  SELECT
    *
  FROM
    t_messages
  WHERE
    (user_fk = '$userId' AND recipient_id = '$recipientId') OR
    (user_fk = '$recipientId' AND recipient_id = '$userId')
    ORDER BY message_id DESC
  ");

while($row = mysqli_fetch_array($messageResult)){

  if ($row['user_fk'] == $userId) {

    echo '<div class="message-box"><div class="message">';

    echo '<div class="profile-pic"><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$_SESSION['profile'].'" /></div>';

    echo '<div class="message-text"><p class="message-time"><i>message sent : <strong>'.date('d / m / Y @ H:i ', strtotime($row['time'])).'</strong></i></p>';

    echo '<div class="message-point"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121.21 91"><defs><style>.fill-left{fill:#A293C7;}</style></defs><title>point</title><polygon class="fill-left" points="121.21 0 121.21 91 0 0.06 121.21 0"/></svg></div>';

    echo '<p class="message-bubble">'.$row['message'].'</p></div></div></div>';

  } else {


    echo '<div class="message-box-right"><div class="message-right">';

    echo '<div class="profile-pic"><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$recipientProfile.'" /></div>';

    echo '<div class="message-text-right"><p class="message-time-right"><i>message sent : <strong>'.date('d / m / Y @ H:i ', strtotime($row['time'])).'</strong></i></p>';

    echo '<div class="message-point-right"><svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121.21 91"><defs><style>.fill-right{fill:#7B66AD;}</style></defs><title>Untitled-1</title><polygon class="fill-right" points="0 0 0 91 121.21 0.06 0 0"/></svg></div>';

    echo '<p class="message-bubble-right">'.$row['message'].'</p></div></div></div>';

  }

}

?>

<div class="reply-box">

  <h3>Reply</h3>

  <form method="post" action="add-message.php">

    <input type="hidden" class="hidden-input" name="recipient_id" value="1">
    <textarea type="text" name="message" placeholder="Write something..."></textarea>

    <div class="reply-buttons">

      <a class="button cancel">Cancel</a>
      <input type="submit" class="button cancel" value="Send">

    </div>

  </form>

</div>


<?php

mysqli_close($link);

include('footer.php');

} else {

  header('Location: index.php');

}

?>
