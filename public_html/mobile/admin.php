<!--
File Name: admin.php
Author Name: Vincent Nguyen
Website Name: VNWorld
Desc: To access this page you need to be logged in as admin.
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Mobile | Home</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="VNTheme.css" type="text/css"/>
  <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" /> 
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script> 
  <script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script> 
    </head>
    <body>
        
         <?php
    
       require_once('beginsession.php');
       require_once('connectvars.php');
       $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if(isset($_SESSION['user_id']))
       {
           
       
       ?>
        
       ?>
       
        <div data-role="page" id="home">
            <div data-role="header" data-position="fixed">      
            <h1><img id="imglogo" src="images/vnimage.png" alt="logo"/></h1>
                <div data-role="navbar">
            <ul data-role="listview">
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/index.php" data-role="button" data-inline="true">Home</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileAbout.html" data-role="button" data-inline="true">About Me</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileContact.html" data-role="button" data-inline="true">Contact</a></li>
            </ul>
        </div>
            
             <div data-role="content">
       <ul data-role="listview">
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/logout.php" data-role="button" data-inline="true">Logout</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/businessContacts.php" data-role="button" data-inline="true">Business</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileProjects.html" data-role="button" data-inline="true">Project</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileServices.html" data-role="button" data-inline="true">Services</a></li>
            </ul>
        </div>
            </div>
                   <h1>Vinni Nguyen</h1>
            <img id="selfportrait2" src="images/vinniintro.jpg" alt="selfportrait" />
            <p>An enthusiastic programmer who is ready to take on the age of technology.
                <br>Watch him as he evolves and pursues his life long dream of being a dedicated professional programmer.</p>
     
        
            <h3>Connect With Me</h3>
              <ul>      
                   <li><a href="https://github.com/VincentNguyen" title="">GitHub</a></li>
                    <li><a href="https://twitter.com/ayoitsvinni" title="">Twitter</a></li>
            </ul>
            </div>
     
            <div data-role="footer">
                <h4>footer</h4>
            </div>
        <?php
       }
       else{
              header('Location: http://webdesign4.georgianc.on.ca/~200210636/VNWorld/index.php');
             
       }
        mysqli_close($dbc);
        ?>
    
    </body>
</html>
