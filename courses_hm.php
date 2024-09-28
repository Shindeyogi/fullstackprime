<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "tnp_k";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all data from 'courses' table
$sql = "SELECT image2, course_name FROM courses where status= '1'";  
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>
<body>
<style>
    /* Navigation bar background color */
    .navbar {
        background-color: #ffffff; /* Change the background color as needed */
    }

    /* Navigation links */
    .navbar-nav .nav-link {
        color: #02236d; /* Change the color to blue */
        font-weight: bold; /* Make the text bold */
        padding: 10px 15px; /* Add padding to the links */
    }

    /* Active link */
    .navbar-nav .nav-item.active .nav-link {
        color: #02236d; /* Change the color for active links */
    }

    /* Dropdown menu */
    .dropdown-menu {
        background-color: white; /* Change the background color of dropdown menu */
        border: 1px solid #dddddd; /* Add border to the dropdown menu */
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    /* Dropdown items */
    .dropdown-menu .dropdown-item {
        color: #02236d; /* Change the color of dropdown items */
        font-weight: bold; /* Make the text bold */
    }

    /* Navbar toggler icon color */
    .navbar-toggler-icon {
        color: #02236d; /* Change the color of the toggler icon */
    }

    /* Adjust margin-right for the navbar-toggler */
    .navbar-toggler {
        margin-right: 15px; /* Add margin-right for spacing */
    }
    .{
        margin-bottom: -10px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">Sanity Technology</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#Internship">Internships</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#gallery">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#events">Events</a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link" href="#courses">Courses</a>
                </li>  
                <li class="nav-item active">
                    <a class="nav-link" href="placement_fetch.php">Placement</a>
                </li>
                <li class="nav-item active dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        More
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdownMore">
        <a class="dropdown-item" href="#about-us">About Us</a>
        <a class="dropdown-item" href="add_developer_fetch.php">Internship</a>
    </div>
</li>
                <li class="nav-item active">
                    <a class="nav-link" href="center_fetch.php">Franchise</a>
                </li>
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="contact_us.html">Contact us</a>
                </li> -->
            </ul>

        </div>
        
        

        <!-- Move the following list inside the navbar-collapse div -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto ml-auto-mobile">
            <li class="nav-item active dropdown center">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Login<svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M480-120v-80h280v-560H480v-80h280q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H480Zm-80-160-55-58 102-102H120v-80h327L345-622l55-58 200 200-200 200Z"/></svg>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="student23.php">Student Login</a>
                    <a class="dropdown-item" href="#">Employee Login</a>
                    <a class="dropdown-item" href="job_provider.php">Job-provider Login</a>
                </div>
            </li>
        </ul>
    </div>
</nav>


<br>
<br>



    <div class="container mt-5">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-3 col-md-6 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . htmlspecialchars($row["image2"]) . '" class="card-img-top" alt="Course Image">';
                    echo '<div class="card-body text-center" >';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["course_name"]) . '</h5>';
                    echo '<a href="subcourses.php?course_name=' . urlencode($row["course_name"]) . '" class="btn btn-primary btn-learn-more" style="width: 180px; height: 55px;">Learn More</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="col-12"><p class="text-center">No records found</p></div>';
            }
            ?>
        </div>
    </div>


    

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
