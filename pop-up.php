<div class="popup-container">

  <div class="sign-out-box">

    <div class="popup-box-title">
      <h3>Sign out</h3>
    </div>

    <p>Are you sure you wish to sign out of Coco?</p>

    <div class="block-button">

      <a href="#" class="button cancel">Cancel</a>
      <a href="sign-out.php" class="button send">Sign Out</a>

    </div>

  </div>

  <div class="block-box">

    <div class="popup-box-title">
      <h3>Block Connection</h3>
    </div>

    <p>This connection will no longer be connected with you. Do you wish to proceed?</p>

    <div class="block-button">

      <a href="#" class="button cancel">Cancel</a>
      <a href="#" class="button send">Block</a>

    </div>

  </div>

  <div class="add-box">

    <div class="popup-box-title">
      <h3>Send Request</h3>
    </div>

    <p>A connection request will be sent to this user. Do you wish to proceed?</p>

    <div class="block-button">

      <a href="#" class="button cancel">Cancel</a>
      <a href="#" class="button send">Send</a>

    </div>

  </div>

  <div class="accept-box">

    <div class="popup-box-title">
      <h3>Add Connection</h3>
    </div>

    <p>Do you wish to proceed and accept this request?</p>

    <div class="block-button">

      <a href="#" class="button cancel">Cancel</a>
      <a href="#" class="button send">Accept</a>

    </div>

  </div>

  <div class="reply-box">

    <div class="popup-box-title">
      <h3>Send Message</h3>
    </div>

    <form method="post" action="add-message.php">

      <input type="hidden" class="hidden-input" name="recipient_id" value="1">
      <textarea type="text" name="message" placeholder="Write something..."></textarea>

      <div class="reply-buttons">

        <a class="button cancel">Cancel</a>
        <input type="submit" class="button cancel" value="Send">

      </div>

    </form>

  </div>

  <div class="password-box">

    <div class="popup-box-title">
      <h3>Change password</h3>
    </div>

    <p>An email will be sent to you with details to reset your password.</p>

    <div class="block-button">

      <a href="#" class="button cancel">Cancel</a>
      <a href="#" class="button send">Send</a>

    </div>

  </div>

</div>

<div class="commute-box">

  <div class="popup-box-title">
    <h3>edit commute</h3>
  </div>

  <form method="post" action="edit-commute.php">

    <div class="form-option">

      <p>Leaving From : </p>

        <div class="styled-select">
          <select name="start">
             <option><?php echo $_SESSION['start']; ?></option>

             <?php

               $locations = mysqli_query($link, "
                 SELECT *
                 FROM t_locations
                 ");

               while($row = mysqli_fetch_array($locations)){

                 echo '<option>'.$row['location'].'</option>';

              } ?>

          </select>
        </div>

      </div>

      <div class="form-option">

        <p>Commuting To : </p>

          <div class="styled-select">
            <select name="destination">
               <option><?php echo $_SESSION['destination']; ?></option>

               <?php

                 $destinations = mysqli_query($link, "
                   SELECT *
                   FROM t_locations
                   ");

                 while($row1 = mysqli_fetch_array($destinations)){

                   echo '<option>'.$row1['location'].'</option>';

                } ?>

            </select>
          </div>

        </div>

      <div class="form-option">

        <p>Time Starting : </p>

          <div class="styled-select">
            <select name="morningtime">
               <option><?php echo $_SESSION['morning']; ?></option>

               <?php

                 $morning = mysqli_query($link, "
                   SELECT *
                   FROM t_morningtimes
                   ");

                 while($row2 = mysqli_fetch_array($morning)){

                   echo '<option>'.$row2['time'].'</option>';

                } ?>

            </select>
          </div>

      </div>

      <div class="form-option">

        <p>Time Returning : </p>

          <div class="styled-select">
            <select name="eveningtime">
               <option><?php echo $_SESSION['evening']; ?></option>

               <?php

                 $evening = mysqli_query($link, "
                   SELECT *
                   FROM t_eveningtimes
                   ");

                 while($row3 = mysqli_fetch_array($evening)){

                   echo '<option>'.$row3['time'].'</option>';

                } ?>

            </select>
          </div>

        </div>

    <div class="reply-buttons">

      <a href="#" class="button cancel">Cancel</a>
      <input type="submit" class="button cancel" value="Save">

    </div>

  </form>

</div>

<div class="details-box">

  <div class="popup-box-title">
    <h3>edit details</h3>
  </div>

  <form method="post" action="edit-details.php" enctype="multipart/form-data">

    <input type="text" name="firstname" placeholder="First Name" value="<?php echo $_SESSION['firstname']; ?>">
    <input type="text" name="lastname" placeholder="Last Name" value="<?php echo $_SESSION['lastname']; ?>">
    <input type="text" name="email" placeholder="Email" value="<?php echo $_SESSION['email']; ?>">
    <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $_SESSION['phone']; ?>"><br/><br/>
    &nbsp;<span>Edit Profile Image</span>&nbsp;&nbsp;<input type="file" name="uploadedFile" id="fileToUpload">


    <div class="reply-buttons">

      <a href="#" class="button cancel">Cancel</a>
      <input type="submit" class="button cancel" value="Save">

    </div>

  </form>

</div>


<div class="intro-box">

  <div class="top-bar-intro">

    <div class="skip-intro">

        <a class="skip-button close-intro">Close</a>

    </div>

  </div>

  <div class="intro-content">

    <div class="slideshow">

      <div class="slide">

        <h4> Welcome to your Coco dashboard</h4>
        <p>This is an guide to show you how to get the most out of your new CoCo account</p>
        <div class="slide-img">
          <img src="img/slider1.jpg" alt="Image One" />
        </div>

      </div>

    	<div class="slide">
        <div class="slide-img">
    		<img src="img/screen1.png" alt="Image One" />
      </div>
        <h5 class="slide-title">My Connections</h5>
        <p class="slide-text">Here you will see all your connections and requests received from other users</p>
    	</div>

    	<div class="slide">
        <img src="img/screen2.png" alt="Image One" />
        <h5 class="slide-title">My Connections</h5>
        <p class="slide-text">In this section you have the option to accept requests and view details and messages from users you are connected with</p>
    	</div>

    	<div class="slide">
        <img src="img/screen3.png" alt="Image One" />
        <h5 class="slide-title">Add Connection</h5>
        <p class="slide-text">In this section you will see a list of users that have a commute similar to yours</p>
    	</div>

      <div class="slide">
        <img src="img/screen4.png" alt="Image One" />
        <h5 class="slide-title">Add Connection</h5>
        <p class="slide-text">From this section you can send a request to other users to form a connection with yourself</p>
      </div>

      <div class="slide">
        <img src="img/screen5.png" alt="Image One" />
        <h5 class="slide-title">Profile</h5>
        <p class="slide-text">Here you will find all your personal information as well as commute details</p>
      </div>

      <div class="slide">
        <img src="img/screen6.png" alt="Image One" />
        <h5 class="slide-title">Profile</h5>
        <p class="slide-text">These details can be edited at any time by using the options provided on each sub section</p>
      </div>

      <div class="slide">
        <img src="img/screen7.png" alt="Image One" />
        <h5 class="slide-title">Messaging</h5>
        <p class="slide-text">In this section you will find details of the user you have selected, as well as a full timeline of all messages that have been sent to one another</p>
      </div>

      <div class="slide">
        <img src="img/screen8.png" alt="Image One" />
        <h5 class="slide-title">Messaging</h5>
        <p class="slide-text">Use the reply button in the top right corner of the timeline to send a reply to this user</p>
      </div>

      <?php if ($_SESSION['morning'] == NULL) { ?>

        <div class="slide form notop">

          <h5 class="slide-form-title">Add your commute details</h5>

          <form method="post" action="edit-commute.php">

            <div class="form-option">

              <p>Leaving From : </p>

                <div class="styled-select">
                  <select name="start">
                     <option>Start Location...</option>

                     <?php

                       $locations = mysqli_query($link, "
                         SELECT *
                         FROM t_locations
                         ");

                       while($row = mysqli_fetch_array($locations)){

                         echo '<option>'.$row['location'].'</option>';

                      } ?>

                  </select>
                </div>

              </div>

              <div class="form-option">

                <p>Commuting To : </p>

                  <div class="styled-select">
                    <select name="destination">
                       <option>Destination...</option>

                       <?php

                         $destinations = mysqli_query($link, "
                           SELECT *
                           FROM t_locations
                           ");

                         while($row1 = mysqli_fetch_array($destinations)){

                           echo '<option>'.$row1['location'].'</option>';

                        } ?>

                    </select>
                  </div>

                </div>

              <div class="form-option">

                <p>Time Starting : </p>

                  <div class="styled-select">
                    <select name="morningtime">
                       <option>Time Starting...</option>

                       <?php

                         $morning = mysqli_query($link, "
                           SELECT *
                           FROM t_morningtimes
                           ");

                         while($row2 = mysqli_fetch_array($morning)){

                           echo '<option>'.$row2['time'].'</option>';

                        } ?>

                    </select>
                  </div>

              </div>

              <div class="form-option">

                <p>Time Returning : </p>

                  <div class="styled-select">
                    <select name="eveningtime">
                       <option>Time Coming Home...</option>

                       <?php

                         $evening = mysqli_query($link, "
                           SELECT *
                           FROM t_eveningtimes
                           ");

                         while($row3 = mysqli_fetch_array($evening)){

                           echo '<option>'.$row3['time'].'</option>';

                        } ?>

                    </select>
                  </div>

                </div>

            <div class="reply-buttons-form">

              <a href="#" class="button cancel">Cancel</a>
              <input type="submit" class="button cancel" value="Save">

            </div>

          </form>

      <?php } ?>

  </div>

  </div>

  <div class="bottom-bar-intro">

    <div class="next-intro">

        <a id="next" class="skip-button">Next</a>

    </div>

    <div class="back-intro">

        <a id="prev" class="skip-button">Back</a>

    </div>

  </div>

  </div>


</div>
