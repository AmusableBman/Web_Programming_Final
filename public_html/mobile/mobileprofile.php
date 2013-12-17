<!DOCTYPE html>
<!--
    File Name          : viewprofile1.php
    Author             : Brandon Hewlett & Vincent Nguyen
    Website Name       : Zepic
    File Description   : This page allows the user to view their own profile.
     
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen" href="StylePhixx.css" rel="stylesheet">
    </head>
    <body>

<?php
  $page_title = 'Home Page';
  require_once('header1.php');   
  // Start the session
  require_once('initializesession.php');
  require_once('connectvars.php');
?>
          <div data-role="header" data-position="fixed">      
                <div data-role="navbar">
            <ul data-role="listview">
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/Zepic/mobile/mobileindex2.php" data-role="button" data-inline="true">Home</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileprofile.php" data-role="button" data-inline="true">View Profile</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileeditblog.php" data-role="button" data-inline="true">Edit Blog</a></li>
            </ul>
        </div>
            
             <div data-role="content">
       <ul data-role="listview">
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileeditprofile.php" data-role="button" data-inline="true">Edit Profile</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/logout.php" data-role="button" data-inline="true">Logout</a></li>
            </ul>
        </div>
            </div>
        
                <?php
  // Make sure the user is logged in before going any further.
  if (!isset($_SESSION['user_id'])) {
    echo '<p class="login">Please <a href="login.php">log in</a> to access this page.</p>';
    exit();
  }

  // Show the navigation menu
  require_once('navigation.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Grab the profile data from the database
  if (!isset($_GET['user_id'])) {
    $query = "SELECT username, first_name, last_name, gender, birthdate, city, state FROM Zepic_user WHERE user_id = '" . $_SESSION['user_id'] . "'";
  }
  else {
    $query = "SELECT username, first_name, last_name, gender, birthdate, city, state FROM Zepic_user WHERE user_id = '" . $_GET['user_id'] . "'";
  }
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // The user row was found so display the user data
    $row = mysqli_fetch_array($data);
    echo '<table>';
    if (!empty($row['username'])) {
      echo '<tr><td class="label">Username:</td><td>' . $row['username'] . '</td></tr>';
    }
    if (!empty($row['first_name'])) {
      echo '<tr><td class="label">First name:</td><td>' . $row['first_name'] . '</td></tr>';
    }
    if (!empty($row['last_name'])) {
      echo '<tr><td class="label">Last name:</td><td>' . $row['last_name'] . '</td></tr>';
    }
    if (!empty($row['gender'])) {
      echo '<tr><td class="label">Gender:</td><td>';
      if ($row['gender'] == 'M') {
        echo 'Male';
      }
      else if ($row['gender'] == 'F') {
        echo 'Female';
      }
      else {
        echo '?';
      }
      echo '</td></tr>';
    }
    if (!empty($row['birthdate'])) {
      if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
        // Show the user their own birthdate
        echo '<tr><td class="label">Birthdate:</td><td>' . $row['birthdate'] . '</td></tr>';
      }
      else {
        // Show only the birth year for everyone else
        list($year, $month, $day) = explode('-', $row['birthdate']);
        echo '<tr><td class="label">Year born:</td><td>' . $year . '</td></tr>';
      }
    }
    if (!empty($row['city']) || !empty($row['state'])) {
      echo '<tr><td class="label">Location:</td><td>' . $row['city'] . ', ' . $row['state'] . '</td></tr>';
    }
   
    echo '</table>';
    if (!isset($_GET['user_id']) || ($_SESSION['user_id'] == $_GET['user_id'])) {
      echo '<p>Would you like to <a href="editprofile1.php">edit your profile</a>?</p>';
    }
  } // End of check for a single row of user results
  else {
    echo '<p class="error">There was a problem accessing your profile.</p>';
  }

  mysqli_close($dbc);
?>

<?php
  // Insert the page footer
  require_once('footer1.php');
?>

       </body>
</html>
