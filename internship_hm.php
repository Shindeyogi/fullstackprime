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
$sql = "SELECT id, image,internship,position,location,start_date FROM internships where status='1'";
$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internships</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
       /* Navigation bar background color */
       .navbar {
    background-color: #ffffff; /* Change the color as needed */
    position: fixed; /* Set position to relative */
    top: 0; /* Align to the top of the page */
    left: 0; /* Align to the left of the page */
    height: 10vh; /* Set the height to cover the entire viewport */
    width: 20px; /* Set the width of the navbar */
    padding: 20px;
    z-index: 100; /* Set a high z-index to ensure the navbar appears on top */
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow effect */
    }

    /* Navigation links */
    .navbar-nav .nav-link {
        color:  #02236d; /* Change the color as needed */
        font-weight: bold; /* Make the text bold */
        padding: 10px 15px; /* Add padding to the links */
    }

    .carousel {
    margin-top: 56px; /* Adjust margin-top to create space for the navbar */
}

/* Apply the shadow to navbar when scrolling */
.navbar.scrolled {
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow effect */
}

/* Adjust margin-top of carousel when navbar is scrolled */
.carousel.scrolled {
    margin-top: 0px; /* No margin-top when navbar is scrolled */
}

/* Custom CSS to make all carousel images full size */
.carousel-item img {
    width: 100%; /* Set width to fill the entire container */
    height: 100vh; /* Set height to fill the entire viewport */
    object-fit: cover; /* Maintain aspect ratio while covering the entire space */
}


    /* Active link */
    .navbar-nav .nav-item.active .nav-link {
        color:  #02236d; /* Change the color for active links */
    }

    /* Dropdown menu */
    .dropdown-menu {
        background-color: white; /* Change the background color of dropdown menu */
        border: 1px solid #dddddd; /* Add border to the dropdown menu */
    }
    .dropdown:hover .dropdown-menu{
        display: block;
    }
    /* Dropdown items */
    .dropdown-menu .dropdown-item {
        color:  #02236d; /* Change the color of dropdown items */
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

     /* Custom CSS to make all carousel images equal in size */
     .carousel-item img {
      height: 500px; /* Adjust the height as needed */
      object-fit: cover; /* Maintain aspect ratio while covering the entire space */
    }
    .border-right {
    border-right: 1px solid #ccc; /* Adjust the border color and thickness as needed */
}

</style>
<body>
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
                <li class="nav-item active">
                    <a class="nav-link" href="#about-us">About us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="center_fetch.php">Franchise</a>
                </li>
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
                    <a class="dropdown-item" href="#">Student Login</a>
                    <a class="dropdown-item" href="#">Employee Login</a>
                    <a class="dropdown-item" href="#">Job-provider Login</a>
                </div>
            </li>
        </ul>
    </div>
</nav>


<div class="container mt-5">
    <div class="row">
    <?php
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-lg-4 col-md-6 mb-4">';
        echo '<div class="card shadow rounded ">';
        echo '<div class="row no-gutters">';
        echo '<div class="col-md-12">';
        echo '<div class="card-body text-center">';
        echo '<h2 class="card-title mb-4">' . htmlspecialchars($row["internship"]) . '</h2>'; // Added margin-bottom
        echo '<p class="card-text"><strong><i class="fas fa-user" style="color: skyblue;"></i> Position:</strong> ' . htmlspecialchars($row["position"]) . '</p>';
        echo '<p class="card-text"><strong><i class="fas fa-map-marker-alt field-icon" style="color: #ff0000;"></i> Location:</strong> ' . htmlspecialchars($row["location"]) . '</p>';
        // echo '<p class="card-text"><strong><i class="fas fa-calendar-alt" style="color: blue;"></i> Start Date:</strong> ' . htmlspecialchars($row["start_date"]) . '</p>';
        $start_date = date('Y-m-d', strtotime($row["start_date"]));
        echo '<p class="card-text"><strong><i class="fas fa-calendar-alt" style="color: blue;"></i> Start Date:</strong> ' . htmlspecialchars($start_date) . '</p>';

        
        // You can include more labels as needed
        
        echo '<a href="internship_fetch.php?id=' . $row["id"] . '" class="btn btn-primary">View More</a>';

        
        echo '</div>';
        echo '<div class="card-footer bg-transparent border-0">';
        // Additional footer content if needed
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="col-12"><p class="text-center">No records found</p></div>';
}
?>



</div>


    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
