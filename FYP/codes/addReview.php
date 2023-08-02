<?php
session_start();
include "dbFunctions.php";

$hotelId = $_GET['hotelId'];
    
?>
<html>
    <head>
        <title>Add Hotel Reivews</title>
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

            <center>
        <form id="form" action="doAddReview.php" method="post">
            <h1 font-weight="bold">Add Review</h1>
            <input type ="hidden" name="reviewId" value="<?php echo $reviewId?>"/>
                Comments:<br/>
                <textarea id='review' name="review" rows="15" cols="70"></textarea><br/>
                Ratings:<br/>
                <select name="rating">
                    <option value="1"selected>1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>

                <input type ="hidden" name="hotelId" value="<?php echo $hotelId?>"/>
                
                <br/><input id="submit" type="submit" value="Add Review"/>
                <br><br/>
                <a href="hotelReview.php?hotelId=<?php echo $hotelId; ?>">Back</a> to review page!
        </form>
    </center>
    </body>
</html>
