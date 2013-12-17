<!DOCTYPE html>
<!--
    File Name : viewPost.php
    Author : Brandon Hewlett & Vincent Nguyen
    Website Name : Zepic
    File Description : This page allows people to view posts
     
-->
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="Zepic.css"rel="stylesheet">
    </head>
    <body>

        <?php
        
       
       require_once('header1.php');
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
	   
	 if(isset($_SESSION['user_id']))
	 {
		?>
		
		<form method="post" action="submitComment.php" enctype="multipart/form-data">
		<label for="comment">Comment: (Max Lenth - 500 chars)</label><br />
		<input type="text" name="comment" maxlength="500"></input>
		
		<input type="hidden" value="<?php echo $post_id;?>" name="content_id">
		<input type="hidden" value="<?php echo $_SESSION['user_id'];?>" name="user_id">
		
		<input type="submit" value="Comment" class="button" />
		<?php
	 }else{
	 echo "<p>Please log in to post and view comments<p>";
	 }
	mysqli_close($dbc);   
   require_once('footer1.php');
?>
</body>
</html>
