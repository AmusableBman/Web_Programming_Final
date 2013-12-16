<!DOCTYPE html>
<!--
    File Name          : editprofile1.php
    Author             : Brandon Hewlett & Vincent Nguyen
    Website Name       : Zepic
    File Description   : The page allows the user to edit their profile.
     
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="Zepic.css"rel="stylesheet">
    </head>
    <body>

<?php
  // Start session
  $page_title = 'Edit Profile';
  require_once('header1.php'); 
  require_once('initializesession.php');
  require_once('connectvars.php');

  // Validate the user is logged in before doing anything else.
  if (!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="logon1.php">log in</a> to access this page.</p>';
    exit();
  }
  require_once('navigation.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $first_name = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    $last_name = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    $gender = mysqli_real_escape_string($dbc, trim($_POST['gender']));
    $birthdate = mysqli_real_escape_string($dbc, trim($_POST['birthdate']));
    $city = mysqli_real_escape_string($dbc, trim($_POST['city']));
    $state = mysqli_real_escape_string($dbc, trim($_POST['state']));

      if (!empty($first_name) && !empty($last_name) && !empty($gender) && !empty($birthdate) && !empty($city) && !empty($state)) {
        // Only set the picture column if there is a new picture
 
        }
        else {
          $query = "UPDATE Zepic_user SET first_name = '$first_name', last_name = '$last_name', gender = '$gender', " .
            " birthdate = '$birthdate', city = '$city', state = '$state' WHERE user_id = '" . $_SESSION['user_id'] . "'";
        }
        mysqli_query($dbc, $query);

        // Confirm 
        echo '<p>Your profile has been successfully updated. Would you like to <a href="viewprofile1.php">view your profile</a>?</p>';

        mysqli_close($dbc);
        exit();
      }
  else {
    // Grab the profile data from the database
    $query = "SELECT first_name, last_name, gender, birthdate, city, state, picture FROM Zepic_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
    $data = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($data);

    if ($row != NULL) {
      $first_name = $row['first_name'];
      $last_name = $row['last_name'];
      $gender = $row['gender'];
      $birthdate = $row['birthdate'];
      $city = $row['city'];
      $state = $row['state'];
    }
    else {
      echo '<p class="error">There was a problem accessing your profile.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MM_MAXFILESIZE; ?>" />

      <label for="firstname">First name:</label>
      <input type="text" id="firstname" name="firstname" value="<?php if (!empty($first_name)) echo $first_name; ?>" /><br />
      <label for="lastname">Last name:</label>
      <input type="text" id="lastname" name="lastname" value="<?php if (!empty($last_name)) echo $last_name; ?>" /><br />
      <label for="gender">Gender:</label>
      <select id="gender" name="gender">
        <option value="M" <?php if (!empty($gender) && $gender == 'M') echo 'selected = "selected"'; ?>>Male</option>
        <option value="F" <?php if (!empty($gender) && $gender == 'F') echo 'selected = "selected"'; ?>>Female</option>
      </select><br />
      <label for="birthdate">Birthdate:</label>
      <input type="text" id="birthdate" name="birthdate" value="<?php if (!empty($birthdate)) echo $birthdate; else echo 'YYYY-MM-DD'; ?>" /><br />
      <label for="city">City:</label>
      <input type="text" id="city" name="city" value="<?php if (!empty($city)) echo $city; ?>" /><br />
      <label for="state">State:</label>
      <input type="text" id="state" name="state" value="<?php if (!empty($state)) echo $state; ?>" /><br />
      
      <?php if (!empty($old_picture)) {
        echo '<img class="profile" src="' . MM_UPLOADPATH . $old_picture . '" alt="Profile Picture" />';
      } ?>

    <input type="submit" value="Save Profile" name="submit" />
  </form>

<?php
  // Insert the page footer
  require_once('footer1.php');
?>

       </body>
</html>
