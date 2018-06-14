<?php

session_start();

if (isset($_SESSION['userid'])) {

include 'header.php'; ?>

<div class="container">

  <div class="header-box">

    <h1>Add connection</h1>
    <div class="divider-green"></div>
    <p>This is a list of commuters whose travel details match your own. To connect with these commuters, click on the connect button and a request will be sent to that user. </p>

  </div>

  <div class="search">

    <i class="fa fa-search" aria-hidden="true"></i><span>search</span>

  </div>

  <div class="connection-box">

    <div class="connection-box-title">
      <h3>all connections</h3>
    </div>

    <?php

    if ($_SESSION['morning'] == NULL) {

      echo '<i>You have not entered your commute details.<br/> CoCo needs these details to match you with other users</i>.<br/>';
      echo '<a href="#" class="button add-commute edit-commute">add commute</a>';

    } else {

      $ids = array();

      $reqSentResult = mysqli_query($link, "
      SELECT requested_id
      FROM t_requests
      WHERE user_id = ('$userId')
      ");

      while($row = mysqli_fetch_array($reqSentResult)){

        $reqIds[] = $row['requested_id'];

      }

      $reqResult = mysqli_query($link, "
      SELECT user_id
      FROM t_requests
      WHERE requested_id = ('$userId')
      ");

      while($row = mysqli_fetch_array($reqResult)){

        $ids[] = $row['user_id'];

      }

      $myResult = mysqli_query($link, "
      SELECT *
      FROM t_connections
      WHERE (user_fk = ('$userId') AND connected_id != ('$userId') )
      OR (user_fk != ('$userId') AND connected_id = ('$userId') )
      ");

      while($rows = mysqli_fetch_array($myResult)){

        $ids[] = $rows['user_fk'];
        $ids[] = $rows['connected_id'];

      }

      $idList = implode($ids, "', '");

      $k = 0;

      $removeIds = mysqli_query($link, "
        SELECT *
        FROM t_users
        WHERE user_id NOT IN ('$idList')
        AND user_id != ('$userId')
        AND morningtime = ('$morningTime')
        AND eveningtime = ('$eveningTime')
        AND startlocation = ('$startLocation')
        AND destination = ('$destination')
        ");

      while($row = mysqli_fetch_array($removeIds)){

      $requestedId = $row['user_id'];

      $reqLink = 'request-connection.php?requested_id='.$requestedId;

      ?>

      <div class="connection">

        <div class="connection-image">
          <?php echo '<img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['profileimage'].'" />'; ?>
        </div>

        <div class="connection-name">
          <h3><?php echo $row['username']; ?></h3><br/>
          <p>User Since : <?php echo '<i><strong>'.date('F Y', strtotime($row['account-created'])).'</strong></i>' ?></p>
        </div>

        <div class="connection-button">

          <?php if (in_array($requestedId, $reqIds)) { ?>

            <a class="reqsent">request sent</a>

          <?php } else { ?>

            <a rel="<?php echo $reqLink; ?>" class="button addcon">Connect</a>

          <?php } ?>

        </div>

      </div>

    <?php $k++; } } ?>

  </div>

</div>

<?php include 'footer.php';

} else {

  header('Location: index.php');

}

?>
