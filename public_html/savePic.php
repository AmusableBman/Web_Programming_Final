<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Zepic</title>
        <link media="screen"href="StylePhixx.css"rel="stylesheet">
    </head>
    <body>
        <h1>Zepic | Save</h1> 
        <?php
        // Start the session
       require_once('initializesession.php');
       require_once('connectvars.php');
       require_once('navigation.php');

    $image_name = $_FILES['image']['name'];
    echo $image_name . '<br />';
    //show name and file type
    echo 'Files Type: ' . $_FILES['image']['type'];
    //ensure the type is correct
    if(($_FILES['image']['type'] == 'image/jpeg') || ($_FILES['image']['type'] == 'image/pjpeg'))
    {
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);    
     
     //if its valid set variables to assign the directory
     $tmp_directory = $_FILES['image']['tmp_name'];
     $final_directory = 'images/' . $image_name;
     
     //transfer the file
     move_uploaded_file($tmp_directory, $final_directory);
     $id = $_SESSION['user_id'];
     echo '<img src="' . $final_directory . '" width="300px">';
     $sql = "INSERT INTO images (image_name) VALUES ('$final_directory');";
     mysqli_query($dbc, $sql);
     $sql = "UPDATE images SET user_id = '$id' WHERE image_name = '$final_directory'";
     mysqli_query($dbc, $sql);
     mysqli_close($dbc);
  
    }       
header('Location:index2.php')
?>
    </body>
</html>