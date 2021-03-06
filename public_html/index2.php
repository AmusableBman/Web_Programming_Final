<!DOCTYPE html>
<!--
    File Name          : index2.php
    Author             : Brandon Hewlett & Vincent Nguyen
    Website Name       : Zepic
    File Description   : The page is the home page after the user has logged in.
     
-->

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen" href="Zepic.css" rel="stylesheet">
    </head>
    <body>

        <?php
       //changes the header name
       $page_title = 'Home Page';
       require_once('header1.php');
       
       //starts the session
       require_once('initializesession.php');
       require_once('connectvars.php');
       
       //includes the navigation bar
       require_once('navigation.php');
       
       $idtodelete= $_GET['idtodelete'];

  // If user isnt on, try logging them on.
  if (!isset($_SESSION['user_id'])) {
    if (isset($_POST['submit'])) {
      // Connect database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      
      if(!empty($idtodelete))
        {
            $deletequery = "Delete from Zepic_post where id=$idtodelete";
            mysqli_query($dbc,$deletequery);
            echo "<p>".$deletequery."</p>";
        }

      // Grab the data entered
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        
        // Search for username and password in database
        $query = "SELECT user_id, username FROM Zepic_user WHERE username = '$user_username' AND password = SHA('$user_password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // Validating sucessful let the user ID and username, session vars, and cookies, redirect to main page.
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // exp in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // exp in 30 days
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index1.php';
          header('Location: ' . $home_url);
        }
        
        else {
        
          //  Data incorrect, provide error.
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
      
       }
    
      }
      
      else {
       
        //  Data incorrect, provide error.
        $error_msg = 'Sorry, you must enter your username and password to log in.';
      }
    }
  }
  else
  {
     $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
     $sql = "SELECT * FROM Zepic_post LEFT OUTER JOIN Zepic_user ON Zepic_post.user_id = Zepic_user.user_id ORDER BY Zepic_post.id DESC LIMIT 6";
     $result = mysqli_query($dbc, $sql);
     echo '<table>';
     
     while ($row = mysqli_fetch_array($result))
     {
        echo '<th><td>Uploaded By: ' . $row['username'] . "<a href = \"".$_SERVER['PHP_SELF']."?idtodelete="
            .$row['id']."\"> Delete</a>" . '<br /><a href = "viewPost.php?post_id=' . $row['id'] . '"><p width="250">' . $row['title'] . '</p></a></td></th>';
          
 
        if(!empty($idtodelete))
        {
            $deletequery = "Delete from Zepic_post where id=$idtodelete";
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
