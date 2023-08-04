<?php
session_start();
include "dbFunctions.php";

$name = $_POST['name'];
$questions = $_POST['questions'];
$email= $_POST['email'];


$add = true;
$query = "INSERT INTO questions (name, email, questions)
          VALUES ('$name','$email','$questions')";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

if ($result) {
    $add = true;
}
else {
    $add = false;
}
?>
<html>
    <head>
        <title>Add Query</title>
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

        <?php if($add ==true){ ?>
    <center>
        <form id='form' name='doContact' method='post'>
            <h1 font-weight="bold">Your Query  is Successfully Submitted!</h1>
            <p>Name: <?php echo $name; ?></p>
            <p>Email: <?php echo $email; ?></p>       
            <p>Query: <?php echo $questions; ?></p>
            <br/><br/>
            <h1 font-weight="bold">We will get back to you soon!</h1>
                <a href="homepage.php">Back</a> to hotel page!
                </form>
    </center>
            <?php
        } else { ?>
            Query failed to submit.
        <?php } ?>
    </body>
</html>
