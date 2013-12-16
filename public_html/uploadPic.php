<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="StylePhixx.css"rel="stylesheet">
    </head>
    <body>
	<?php require_once('header1.php'); ?>
        <h1>Zepic | Upload</h1> 
        <?php

       require_once('initializesession.php');
       require_once('connectvars.php');
       require_once('navigation.php');
       
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
      ?>
        
  <form method="post" action="savePic.php" enctype="multipart/form-data">
   <div>
    <label for="title">Blog Title:</label>
	<input type= "text" name="title"></input>
    <textarea rows ="8" cols = "100" name="blog" form="blogForm">
	</textarea>
	
   </div>
 
    <input type="submit" value="Upload" class="button" />
  </form>
        <?php
       
        mysqli_close($dbc);
        require_once('footer1.php');
        ?>
    </body>
</html>
