<?php

session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');

require_once('db-connect.php');

$userId = $_SESSION['userid'];

include('header.php');

?>

<div id="#inbox">

<div class="container-dash">

  <div class="opacity-screen"></div>

  <div class="inbox-header">

    <p>Inbox</p>

  </div>

  <div class="container">

    <div class="inbox-list">

      <?php

      $ids = array();

      $myResult = mysqli_query($link, "
      SELECT user_fk, connected_id
      FROM t_connections
      WHERE (user_fk = ('$userId') AND connected_id != ('$userId') )
      OR (user_fk != ('$userId') AND connected_id = ('$userId') )
      ");

      while($rows = mysqli_fetch_array($myResult)){

        $ids[] = $rows['user_fk'];
        $ids[] = $rows['connected_id'];

      }

      $idList = implode($ids, "', '");

      $myConResult = mysqli_query($link, "
      SELECT *
      FROM t_users
      WHERE user_id IN ('$idList')
      AND user_id != '$userId'
      ");

      if ( mysqli_num_rows($myConResult) == 0) {

        echo '<div class="inbox-box"><div class="empty-text">You have no connections</div></div>';

      } else {

      while($row = mysqli_fetch_array($myConResult)){

        ?>

        <div class="inbox-box">

          <div class="inbox-message">

            <table>
              <tr>
                <td>

                <div class="inbox-content">

                  <div class="profile-image">

                    <?php echo '<img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['profileimage'].'" />'; ?>

                  </div>

                </td>

                <td>

                  <h4><?php echo $row['firstname'].' '.$row['lastname']; ?></h4>

                </td>

                <td>

                  <p><strong>

                    <?php

                    $connectionId = $row['user_id'];

                    require_once('db-connect.php');

                    $messageResult = mysqli_query($link, "
                      SELECT
                        *
                      FROM
                        t_messages
                      WHERE
                        (user_fk = ".$userId." AND recipient_id = ".$connectionId.") OR
                        (user_fk = ".$connectionId." AND recipient_id = ".$userId.")
                      ORDER BY message_id DESC LIMIT 1
                      ");

                      $rows = mysqli_fetch_array($messageResult);

                      $messageId = $rows['user_fk'];

                      if ($userId == $messageId) {

                        echo 'You - ';

                      } else if ( mysqli_num_rows($messageResult) == 0) {

                        echo 'No messages yet...';

                      } else {

                        echo $row['firstname'].' - ';

                      } ?>

                  </strong><i> <?php echo mb_strimwidth($rows['message'], 0, 100, "..."); ?> </i></p>

                </td>
              </tr>
            </table>

            <?php echo '<a href="messages.php?user_id='.$connectionId.'" class="button right view">View Messages</a>'; ?>
            <a rel="<?php echo $row['user_id']; ?>" id="reply" class="button message-button right">Quick Reply</a>

          </div>

        </div>

      <?php } } ?>

  </div>

  </div>

  <div class="reply-box">

    <h3>Reply</h3>

    <form method="post" action="add-message.php">

      <input type="hidden" class="hidden-input" name="recipient_id" value="1">
      <textarea type="text" name="message" placeholder="Write something..."></textarea>

      <div class="reply-buttons">

        <a href="#" class="button cancel">Cancel</a>
        <input type="submit" class="button cancel" value="Send">

      </div>

    </form>

  </div>

  <?php mysqli_close($link); ?>

  <?php include('footer.php'); ?>

  <script>

    $( ".message-button" ).click(function() {

      var $messageId = $(this).attr('rel');

      $(".reply-box .hidden-input").attr("value", $messageId);
      $( ".reply-box" ).addClass( "reply-shown" );
      $( ".opacity-screen" ).addClass( "display" );
    });

    $( "#add" ).click(function() {
      $( ".connections-box" ).addClass( "reply-shown" );
      $( ".opacity-screen" ).addClass( "display" );
    });

    $( "#cancel, #send, .add" ).click(function() {
      $( ".reply-box" ).removeClass( "reply-shown" );
      $( ".connections-box" ).removeClass( "reply-shown" );
      $( ".opacity-screen" ).removeClass( "display" );
    });

  </script>
