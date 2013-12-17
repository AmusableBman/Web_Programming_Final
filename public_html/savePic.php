<!--
    File Name : savePic.php
    Author : Brandon Hewlett & Vincent Nguyen
    Website Name : Zepic
    File Description : The purpose of this page is to save picture uploaded.
     
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="Zepic"rel="stylesheet">
    </head>
    <body>
	<?php require_once('header1.php'); ?>
        <h1>Zepic | Save</h1> 
        <?php
        // Start session
       require_once('initializesession.php');
       require_once('connectvars.php');
       require_once('navigation.php');

    $title = $_POST['title'];
	$blog = $_POST['blog'];
	$user_id = $_SESSION['user_id'];
	$date = date('Y/m/d H:i:s', time());
	
    if($title != NULL && $blog != NULL)
    {
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);    
     
     $sql = "INSERT INTO Zepic_post (title, post, user_id, date) VALUES ('$title', '$blog', '$user_id', '$date');";
     mysqli_query($dbc, $sql);
     mysqli_close($dbc);
  
    }       
header('Location:index2.php')
?>
    </body>
</html>
