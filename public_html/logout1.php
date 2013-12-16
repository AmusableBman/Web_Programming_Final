<!--
    File Name : logout1.php
    Author : Brandon Hewlett & Vincent Nguyen
    Website Name : Zepic
    File Description : This page if prompt allows the user to log out
     
-->
<?php
  // If user is logged in, log them out and delete session
  session_start();
  if (isset($_SESSION['user_id'])) {
    // Delete the session vars 
    $_SESSION = array();

    // Delete the session cookie by setting its exp date past its time
    if (isset($_COOKIE[session_name()])) {
      setcookie(session_name(), '', time() - 3600);
    }

    // Destroy the session
    session_destroy();
  }

  // Delete the user ID and username cookies by setting ts exp date past its time
  setcookie('user_id', '', time() - 3600);
  setcookie('username', '', time() - 3600);

  // Redirect 
  $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index1.php';
  header('Location: ' . $home_url);
?>
