<!--
    File Name : submitComment.php
    Author : Brandon Hewlett & Vincent Nguyen
    Website Name : Zepic
    File Description : The purpose of this page is to save a user's comment.
     
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
	   
	   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	   
	   $comment = $_POST['comment'];
	   $user_id = $_POST['user_id'];
	   $post_id = $_POST['post_id'];
	   
	if($title != NULL && $blog != NULL)
    {
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);    
     
     $sql = "INSERT INTO Zepic_comments (comment, user_id, content_id) VALUES ('$comment', '$user_id', '$content_id');";
     mysqli_query($dbc, $sql);
     mysqli_close($dbc);
  
    }       
header('Location:index2.php')  
		
?>
</body>
</html>