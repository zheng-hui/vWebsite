<?php
session_start();
include "dbFunctions.php";
var_dump($_POST);

$entered_username = $_POST['username'];
$entered_password = $_POST['password'];


$queryCheck = "SELECT * FROM users
          WHERE username='$entered_username'
          AND password = '$entered_password'";

$resultCheck = mysqli_query($link, $queryCheck) or die(mysqli_error($link));

if (mysqli_num_rows($resultCheck)) {
    $row = mysqli_fetch_array($resultCheck);
    $_SESSION['userid'] = $row['userid'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['email'] = $row['email'];
    
    if (isset($_POST['remember'])){
        setcookie("username", $row['username'], time()+3600*24*100);
    }
    
} else {
}

mysqli_close($link);
?>
<html>
    <head>
        <title>Login</title>
        <!--  Include reference to CSS stylesheet here -->
        <link rel="stylesheet" type="text/css" href="stylesheets/style_login.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
        <style>
        .fa-solid {
            background-color:#35CBDF;
            border-radius: 50%;
            color: #fff;
            font-size: 30px;
            height: 60px;
            line-height: 60px;
            text-align: center;
            width: 60px;
        }
    </style>
    <body>
                       <nav class="navbar navbar-expand-sm p-3 mb-2 navbar-custom">
            <div>
                <i class="fa fa-solid fa-hotel"  aria-hidden="true"></i>
            </div>
            <div class="container-fluid">

                <a class="navbar-brand" href="#"><span class="text-white">Hotel Review</a></span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="homepage.php"><span class="text-white">Hotels</a></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactUs.php"><span class="text-white">Contact Us</a></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tourist.php"><span class="text-white">Country Origin</a></span>
                        </li>
                        <div class="justify-content-right">
                        <li class="nav-item">
                        <?php
                        if(isset($_SESSION['userid'])) {
                        ?>
                            <a class="nav-link" href="logout.php"><span class="text-white">Logout</a></span>
                        <?php } else { ?>
                            <a class="nav-link" href="login.php"><span class="text-white">Login/Register</a></span>
                        <?php } ?>
                        </li></div>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
                if(isset($_SESSION['username'])) {
         ?>
                <h4>Welcome <?php echo $_SESSION['username'] ?>!</h4>
      
       
    <center>
        <form id='form' name='LoginUser' method='post'>
            <h1 font-weight="bold">Successfully Logged In!</h1>
            <br><br/>
                <a href="homepage.php">Click here</a> to go to the homepage!
                </form>
            <?php
        } else { ?>
            <form id='form' name='FailedLoginUser' method='post'>
            <h1 font-weight="bold">Login Failed</h1>
            <br><br/>
            <p>No matching record found!</p>
            <p>Click here to <a href="login.php">Login</a> again</p>
                </form>
        <?php } ?>
    </center>
    </body>
</html>
