<html>
    <head>
        <title>Vincent Nguyen's Portfolio</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="portfoliocss.css" media="screen" />
    </head>
    <body>
        
        
        <?php
        // Start the session
       require_once('beginsession.php');
       require_once('connectvars.php');
        $user_username = $_POST['username'];
        $user_password = $_POST['password'];
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $query = "SELECT user_id, username FROM vnworld_user WHERE username = '$user_username' AND password = '$user_password'";
        $data = mysqli_query($dbc, $query);
        if (mysqli_num_rows($data) == 1) {
          $row = mysqli_fetch_array($data);
          $_SESSION['user_id'] = $row['user_id'];
          $_SESSION['username'] = $row['username'];
          setcookie('user_id', $row['user_id'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          header('Location: http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/admin.php');
        }
        else {
          echo 'Sorry, you must enter a valid username and password to log in.';
          echo "   <a href=\"http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/index.php\">Click here to return to main page</a>"; 
        }
        
        mysqli_close($dbc);
        ?>