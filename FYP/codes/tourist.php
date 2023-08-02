<?php
session_start();
include "dbFunctions.php"; 

$query = "SELECT * FROM hotels";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrResult[] = $row;
}
?>
<html>
    <head>
        <title>Tourist Type</title>
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
            <form name="form" method="GET">
                <h1 font-weight="bold">Where are you from?</h1>
                <!-- Introduce the DOM-based XSS vulnerability here -->
                
                Region:                    
				<script>
                                    const urlParams = new URLSearchParams(window.location.search);
                                    if (urlParams.has("type")) {
                                        const selectedLocation = urlParams.get("type");
                                        document.write(decodeURI(selectedLocation));
                                    }					                                          
				</script>
                                <br></br>
                                
    <input type="radio" name="type" value="Local" id="local-radio" onchange="updateURL()">
    <label for="local-radio">Local</label>
    
    <input type="radio" name="type" value="America" id="america-radio" onchange="updateURL()">
    <label for="america-radio">America</label>
    
    <input type="radio" name="type" value="Europe" id="europe-radio" onchange="updateURL()">
    <label for="europe-radio">Europe</label>
    
    <input type="radio" name="type" value="Asia" id="asia-radio" onchange="updateURL()">
    <label for="asia-radio">Asia</label>
    
    <input type="radio" name="type" value="Others" id="others-radio" onchange="updateURL()">
    <label for="others-radio">Others</label><br>
                
                <br/><input id="submit" type="submit" value="Select"/>
                <br>
                <a href="homepage.php">Back</a> to homepage!
            </form>
        </center>
    </body>
</html>