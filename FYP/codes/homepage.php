<?php
session_start();
include "dbFunctions.php";

$search = ""; // Initialize the search variable
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

// Construct the SQL query with a WHERE clause to filter by the search term
$query = "SELECT * FROM hotels WHERE hotelName LIKE '%$search%' OR hotelAddress LIKE '%$search%'";
$result = mysqli_query($link, $query) or die(mysqli_error($link));

while ($row = mysqli_fetch_array($result)) {
    $arrResult[] = $row;
}
?>
<html>
    <head>
        <title>Homepage</title>
        <!--  Include reference to CSS stylesheet here -->
        <link rel="stylesheet" type="text/css" href="stylesheets/style_homepage.css"/>
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
        
        .topnav .search-container {
  float: right;
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
                        <form action="homepage.php" method="GET">
                            <input type="text" placeholder="Search.." name="search">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </ul>
                </div>
            </div>
        </nav>
        <?php
                    for ($i = 0; $i < count($arrResult); $i++){
                        $hotelId = $arrResult[$i]['hotelId'];
                        $picture = $arrResult[$i]['picture'];
                        $hotelName = $arrResult[$i]['hotelName'];
                        $hotelAddress = $arrResult[$i]['hotelAddress'];
                    ?>
    <center>
      <div class="container py-5" style="width:1000px">
            <div class=".col-lg bg-light">
                <center><div class="card" id="card" style="width:700px">
                    <br><br/>
                    <img class="card-img-top" src="images/<?php echo $picture ?>" alt="Card image">
                    <span class="d-block p-3 bg-light text-white">
                    <div class="card-body bg-info text-white">
                        <h4 class="card-title"><?php echo $hotelName; ?></h4>
                        <p><?php echo $hotelAddress; ?></p>
                        <a href="hotelInfo.php?hotelId=<?php echo $hotelId; ?>" class="btn btn-success">See More</a></div>
                        </span>
                    <br><br/>
                </div>
            </div>
            </div>
        </center>
                <?php
                }
                ?>
    </body>
</html>
