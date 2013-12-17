<!DOCTYPE html>
<!--
    File Name          : index1.php
    Author             : Brandon Hewlett & Vincent Nguyen
    Website Name       : Zepic
    File Description   : The page is the first page any user or visitor will see before creating a account or signing in.
     
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link rel="stylesheet" href="VNTheme.css" type="text/css"/>
        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" /> 
        <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 
        <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script> 
    </head>
    
    <body>
       <img id="imglogo" src="images/logo.png" alt="logo"/>  
       <p>Log in</p>
        <?php
        // Start the session
       
       require_once('initializesession.php');
       require_once('connectvars.php');
       
       ?>
        <div data-role="navbar">
            <ul data-role="listview">
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/Zepic/index1.php" data-role="button" data-inline="true">Home</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/logout.php" data-role="button" data-inline="true">Logout</a></li>
            </ul>
        </div>
        <?php
        $error_msg = "";
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "SELECT user_id, username FROM Zepic_user WHERE username = '$user_username' AND password = SHA('$user_password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          header('Location: http://webdesign4.georgianc.on.ca/~200210636/Zepic/mobile/mobileindex2.php');
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
        }
      }
      else {
        // The username/password weren't entered so set an error message
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
 mysqli_close($dbc);
       ?>
        <div id="login">    
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($user_username)) echo $user_username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    <input type="submit" value="Log In" name="submit" />

  </form>
        </div>
    </body>
</html>

