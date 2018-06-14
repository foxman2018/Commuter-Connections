
<?php

session_start();

if (isset($_SESSION['userid'])) {


include 'header.php'; ?>

<div class="container">

  <div class="header-box">

    <h1>My Connections</h1>
    <div class="divider-green"></div>
    <p>This panel lists all CoCo users that you are currently connected with as well as requests from other CoCo users. Click on the View Messages button to see a profile and your message timeline for that connection. </p>

  </div>

  <div class="connection-box">

    <div class="connection-box-title">
      <h3>requests</h3>
    </div>

      <?php

      $j = 0;

      $reqIds = array();

      $reqResult = mysqli_query($link, "
      SELECT *
      FROM t_requests
      WHERE requested_id = '".$userId."'
      ");

      while($rows = mysqli_fetch_array($reqResult)){

        $reqIds[] = $rows['user_id'];

      }

      $reqList = implode($reqIds, "', '");

      $myReqResult = mysqli_query($link, "
      SELECT *
      FROM t_users
      WHERE user_id IN ('$reqList')
      ");

      if ( mysqli_num_rows($myReqResult) == 0) {

        echo '<div class="empty-text"><i>You have no requests at this time</i></div>';

      } else {

      while($row = mysqli_fetch_array($myReqResult)){

        $result[] = $row['username'];

        $requestId[] = $row['user_id'];

        $addLink = 'add-connection.php?request_id='.$requestId[$j].'';

      ?>

      <div class="connection">

      <div class="connection-image">
        <img src="uploads/<?php echo $row['profileimage']; ?>" />
      </div>

      <div class="connection-name">
        <h3><?php echo $row['username']; ?></h3><br/>
        <p>User Since : <?php echo '<i><strong>'.date('F Y', strtotime($row['account-created'])).'</strong></i>' ?></p>
      </div>

      <div class="connection-button">
        <a rel="<?php echo $addLink; ?>" class="button accept">Accept</a>
      </div>


    </div>

    <?php $j++; } ?>

    <?php } ?>

  </div>

  <div class="connection-box">

    <div class="connection-box-title">
      <h3>my connections</h3>
    </div>

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

          echo '<div class="empty-text"><i>You have no connections yet</i></div>';

        } else {

        while($row = mysqli_fetch_array($myConResult)){

          $connectedId = $row['user_id'];

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
          <?php echo '<a href="connection-profile.php?user_id='.$row['user_id'].'" class="button right view">View Messages</a>'; ?>
        </div>

      </div>

    <?php } ?>

    <?php } ?>

  </div>

</div>

<?php include 'footer.php';

} else {

  header('Location: index.php');

}

?>
