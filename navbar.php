<div class="navbar">

  <div class="navbar-pic">

    <?php echo '<img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$_SESSION['profile'].'" />'; ?>

  </div>

  <div class="nav-user">

    <h3><?php echo $_SESSION['username']; ?></h3>
    <h5><i><?php echo $_SESSION['email']; ?></i></h5>

  </div>

  <div class="nav-tabs">

    <a href="connections.php" id="connections" class="nav-tab">my Connections</a>
    <a href="add-connections.php" id="inbox" class="nav-tab">add connection</a>
    <a href="profile.php" id="profile" class="nav-tab">Profile</a>
    <a href="#" id="sign-out" class="nav-tab">Sign Out</a>

  </div>

  <div class="help-box">

    <a class="info-box-button"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;info</a>
    
  </div>

  <div class="side-slope">

    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 81.46 1433.89"><defs><style>.sideslope{fill:#414042;}</style></defs><title>Untitled-2</title><polygon class="sideslope" points="0 1433.89 0 1433.89 0 0 81.46 0 0 1433.89"/></svg>
  </div>

</div>
