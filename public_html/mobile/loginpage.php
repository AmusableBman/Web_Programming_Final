<!--
To change this template, choose Tools | Templates
and open the template in the editor.
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
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/loginpage.php" data-role="button" data-inline="true">Login</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileProjects.html" data-role="button" data-inline="true">Project</a></li>
                <li><a href="http://webdesign4.georgianc.on.ca/~200210636/VNWorld/mobile/mobileServices.html" data-role="button" data-inline="true">Services</a></li>
            </ul>
        </div>
            </div>
                   <h1>Vinni Nguyen</h1>
               <div id="login">    
              <form method="post" action="login.php">
                 <label for="username">Username:</label>
                  <input type="text" name="username"/><br />
                  <label for="password">Password:</label>
                  <input type="password" name="password" />
                   <input type="submit" value="Log In" name="submit" />
             
             </form>
                   </div>
            <h3>Connect With Me</h3>
              <ul>      
                   <li><a href="https://github.com/VincentNguyen" title="">GitHub</a></li>
                    <li><a href="https://twitter.com/ayoitsvinni" title="">Twitter</a></li>
            </ul>
            </div>
     
            <div data-role="footer">
                <h4>footer</h4>
            </div>
    
    </body>
</html>
