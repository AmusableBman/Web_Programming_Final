<!--
    File Name          : navigation.php
    Author             : Brandon Hewlett & Vincent Nguyen
    Website Name       : Zepic
    File Description   : The page will represent the navigation bar for each page.
     
-->
<?php

  echo '<hr />';
  if (isset($_SESSION['username'])) {
    echo '<a href="index2.php">Home</a> | ';
    echo '<a href="uploadPic.php">Upload Picture</a> | ';
    echo '<a href="viewprofile1.php">View Profile</a> | ';
    echo '<a href="editblog1.php">Edit Blog</a> | ';
    echo '<a href="editprofile1">Edit Profile</a> | ';
    echo '<a href="logout1.php">Log Out (' . $_SESSION['username'] . ')</a>';
    
  }
  else {
    echo '<a href="index1.php">Home</a> | ';
    echo '<a href="signup1.php">Sign Up</a>';
  }
  echo '<hr />';
?>
