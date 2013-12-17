<!--
File Name: beginsession.php
Author Name: Vincent Nguyen
Website Name: VNWorld
Desc: This begins the session.
-->
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    if (isset($_COOKIE['user_id']) && isset($_COOKIE['username'])) {
      $_SESSION['user_id'] = $_COOKIE['user_id'];
      $_SESSION['username'] = $_COOKIE['username'];
    }
  }
?>
