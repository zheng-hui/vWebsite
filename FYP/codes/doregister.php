<?php
session_start();
include "dbFunctions.php";
$pic_uploaded = 1;

$theUsername= $_POST['username'];
$thePassword = $_POST['password'];
$theEmail = $_POST['email'];

$image = time().$_FILES["profile_photo"]["name"];
if(move_uploaded_file($_FILES['profile_photo']['tmp_name'],$_SERVER['DOCUMENT_ROOT'].'/FYP/codes/uploads/'.$image))
{
    $target_file = $_SERVER['DOCUMENT_ROOT']. '/register/uploads/'.$image;
    $imageFileType = strtoLower(pathinfo($target_file, PATHINFO_EXTENSION));
    $photoname = basename($_FILES['profile_photo']['name']);
    $photo = time().$photoname;
    /*
    if($imageFileType != "jpg" && imageFileType != "jpeg" && $imageFileType != "png")
        
    {?> 
      <script> 
      alert("Please upload a photo with .jpg/.jpeg/.png extension");
      </script>
     *<?php
     * }
     * else if ($_FILES["profile_photo"]["size"] > 2000000)
     * {?> 
     * <script>
     *  alert("your photo exceed the size of 2 MB");
     * </script>
      <?php }
      else { */
         // $pic_uploaded = 1;
      //}
     
}
if($pic_uploaded == 1)

$link = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
      
/*
    if (isset($_FILES['profile_photo'])) {
    $file_name = $_FILES['profile_photo']['name'];
    $file_tmp = $_FILES['profile_photo']['tmp_name'];
    $file_size = $_FILES['profile_photo']['size'];
    $file_type = $_FILES['profile_photo']['type'];
    
    

    $upload_directory = "uploads/";
    move_uploaded_file($file_tmp, $upload_directory . $file_name);
    $profile_photo_path = $file_name;
    } */
    
$query = "INSERT INTO users(username, password,  email, image) VALUES ('$theUsername', SHA1('$thePassword'),  '$theEmail', '$image')";

$result = mysqli_query($link, $query) or die('Error querying database: ' . mysqli_error($link));

if ($result){
    $add = true;
}
else {
    $add = false;
}

mysqli_close($link);
?>

<html>
    <head>
        <title>Register</title>
        <!--  Include reference to CSS stylesheet here -->
        <link rel="stylesheet" type="text/css" href="stylesheets/style_hotelreview.css"/>
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
                        <div class="justify-content-right">
                        <li class="nav-item">
                        <?php
                        if(isset($_SESSION['userId'])) {
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
        <center>
        <?php if($add ==true){ ?>
        <form id='form' name='registerUser' method='post'>
            <h1 font-weight="bold">Successfully Registered User!</h1>
            <br><br/>
                <a href="login.php">Click here</a> to login!
                </form>
            <?php
        } else { ?>
            <form id='form' name='failedRegisterUser' method='post'>
            <h1 font-weight="bold">Failed to register User</h1>
            <br><br/>
            <p><a href="register.php">Click here</a> to try again</p>
                </form>
        <?php } ?>
    </center>
    </body>
</html>
