
<?php

session_start();

if (isset($_SESSION['userid'])) {

include 'header.php'; ?>

<div class="container">

  <div class="profile-box">

      <div class="profile-pic">

        <?php echo '<img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$_SESSION['profile'].'" />'; ?>

        <div class="profile-pic-overlay"></div>

      </div>

      <div class="profile">

        <h1><?php echo $_SESSION['username']; ?></h1>
        <div class="divider-green"></div>
        <p>CoCo User Since : <?php echo '<i><strong>'.date('F Y', strtotime($_SESSION['account-created'])).'</strong></i>' ?></p>

        <div class="profile-header-buttons">
          <a href="#" class="button white right password">Change Password</a>
        </div>

      </div>

    </div>

    <div class="connection-box-title">
      <h3>personal details</h3>
    </div>

    <div class="profile-buttons">

      <a href="#" class="button right edit-details">Edit details</a>

    </div>

    <div class="details">

  <table>

    <tr>
      <td>
        Name :
      </td>
      <td>
        <?php echo $_SESSION['firstname'].'&nbsp'.$_SESSION['lastname']; ?>
      </td>
    </tr>
    <tr>
      <td>
        Email :
      </td>
      <td>
        <?php echo $_SESSION['email']; ?>
      </td>
    </tr>
    <tr>
      <td>
        Phone :
      </td>
      <td>
        <?php echo$_SESSION['phone']; ?>
      </td>
    </tr>

  </table>

</div>

    <div class="connection-box-title">
      <h3>commute details</h3>
    </div>

    <?php

    if ($_SESSION['morning'] == NULL) {

      echo '<a href="#" class="button add-commute right edit-commute">add commute</a><br/><br/><br/><br/>';
      echo '<i>You have not entered your commute details.<br/> CoCo needs these details to match you with other users</i>.<br/><br/><br/><br/>';

    } else {

    ?>

    <div class="profile-buttons">

      <a href="#" class="button right edit-commute">Edit commute</a>

    </div>

    <div class="details">

      <table>

        <tr>
          <td>
            Start Location :
          </td>
          <td>
            <?php echo $_SESSION['start']; ?>
          </td>
        </tr>
        <tr>
          <td>
            Destination :
          </td>
          <td>
            <?php echo $_SESSION['destination']; ?>
          </td>
        </tr>
        <tr>
          <td>
            Morning Commute Starts :
          </td>
          <td>
            <?php echo $_SESSION['morning']; ?>
          </td>
        </tr>
        <tr>
          <td>
            Evening Commute Starts :
          </td>
          <td>
            <?php echo $_SESSION['evening']; ?>
          </td>
        </tr>

      </table>

    </div>


<?php } include 'footer.php';

} else {

  header('Location: index.php');

}

?>
