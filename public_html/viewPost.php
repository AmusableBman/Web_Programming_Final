<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="StylePhixx.css"rel="stylesheet">
    </head>
    <body>
	<?php require_once('header1.php'); ?>
        <h1>Zepic | Home</h1> 
        <?php
       require_once('initializesession.php');
       require_once('connectvars.php');
       require_once('navigation.php');
	   
	   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	   
	   $post_id= $_GET['post_id'];
	   
	   if(!isset($post_id)){
		echo "<p>Cannot go to this page directly. Please navigate here from the main page.";
	   exit();
	   }else{
		   $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		   
		   $query = "SELECT * from Zepic_post where id=$post_id";
		   
		   $result = mysqli_query($dbc, $query);
		 
		   while ($row = mysqli_fetch_array($result))
		   {
			echo '<h2>' . $row['title'] . '</h2><br /><p>' . $row['post'];
		   }
	   }
	mysqli_close($dbc);   
   require_once('footer1.php');
?>