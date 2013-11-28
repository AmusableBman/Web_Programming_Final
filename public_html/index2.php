<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="StylePhixx.css"rel="stylesheet">
    </head>
    <body>
        <h1>Zepic | Home</h1> 
        <?php
       require_once('initializesession.php');
       require_once('connectvars.php');
       require_once('navigation.php');
       
       $idtodelete= $_GET['idtodelete'];

  // If the user isn't logged in, try to log them in
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      
      if(!empty($idtodelete))
        {
            $deletequery = "Delete from images where image_id=$idtodelete";
            mysqli_query($dbc,$deletequery);
            echo "<p>".$deletequery."</p>";
        }

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
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index1.php';
          header('Location: ' . $home_url);
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
  else
  {
     $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
     $sql = "SELECT * FROM images LEFT OUTER JOIN Zepic_user ON images.user_id = Zepic_user.user_id ORDER BY image_id DESC LIMIT 6";
     $result = mysqli_query($dbc, $sql);
     echo '<table>';
     
     while ($row == mysqli_fetch_array($result))
     {
        echo '<th><td>Uploaded By: ' . $row['username'] . "<a href = \"".$_SERVER['PHP_SELF']."?idtodelete="
            .$row['image_id']."\"> Delete</a>" . '<br /><img src="' . $row['image_name'] . '" width="250"></td></th>';
          
 
        if(!empty($idtodelete))
        {
            $deletequery = "Delete from images where image_id=$idtodelete";
            mysqli_query($dbc,$deletequery);
        }
     }
     
     echo '</table>';
  }
   mysqli_close($dbc);   
   require_once('footer1.php');
   
   ?>
    </body>
</html>
