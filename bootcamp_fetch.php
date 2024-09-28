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

// SQL query to fetch all data from 'events' table
$sql = "SELECT * FROM events where status='1'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Events Gallery</title>
</head>
<body>

<style>
    /* Navigation bar background color */
    .navbar {
        background-color: #ffffff; /* Change the color as needed */
    }

    /* Navigation links */
    .navbar-nav .nav-link {
        color:  #02236d; /* Change the color as needed */
        font-weight: bold; /* Make the text bold */
        padding: 10px 15px; /* Add padding to the links */
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
                    <a class="nav-link" href="internship_main.php">Internships</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="gallery_fetch.php">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="bootcamp_fetch.php">Events</a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link" href="courses_nm.php">Courses</a>
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
                    <a class="dropdown-item" href="std_login.php">Student Login</a>
                    <a class="dropdown-item" href="#">Employee Login</a>
                    <a class="dropdown-item" href="#">Job-provider Login</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<br>
<br>
    <div class="container mt-5">
        <h2 class="mb-4">Events</h2>
        <div class="row">
            <?php
            
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card">';
                    echo '<img src="' . htmlspecialchars($row["event_image"]) . '" class="card-img-top" alt="Event Image" style="height: 200px; width: 150px object-fit: cover;">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["event_name"]) . '</h5>';
                    echo '<p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row["event_location"]) . '</p>';
                    echo '<p class="card-text"><strong>Contact number:</strong> ' . htmlspecialchars($row["event_contact"]) . '</p>';
                    echo '<p class="card-text"><strong>Start Date:</strong> ' . htmlspecialchars($row["start_date"]) . '</p>';
                    echo '<p class="card-text"><strong>End Date:</strong> ' . htmlspecialchars($row["end_date"]) . '</p>';
                    echo '<p class="card-text"><strong>Time:</strong> ' . htmlspecialchars($row["event_time"]) . '</p>';
                    echo '</div>'; // card-body
                    echo '</div>'; // card
                    echo '</div>'; // col
                }
            } else {
                echo '<div class="col-12"><p class="text-center">No records found</p></div>';
            }
            ?>
        </div>
    </div>
    
    <br>

    <style>
    .footer {
    background-color: #02236d; /* Set background color */
    color: white; /* Set text color */
    position: relative;
    bottom: 0;
    width: 100%;
    height: auto;
}
.social-icons a {
    color: white; /* Set social icon color */
    font-size: 24px; /* Set social icon size */
    margin-right: 10px; /* Add margin between social icons */
}
</style>
<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <h5 class="text-white mb-0">&copy;2024 Placement Management System. All rights reserved.</h5>
        <div class="social-icons mt-3">
            <!-- Instagram Icon -->
            <a href="https://www.instagram.com/ltorpune?igsh=c2Zlb3FvaDBjOWNx" target="_blank" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <!-- Facebook Icon -->
            <a href="https://www.facebook.com/people/Prime-Computer-Services/61558423565204/?is_tour_dismissed" target="_blank" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
            <!-- YouTube Icon -->
            <a href="https://youtube.com/@fullstackksirofficial?si=YWBODmYCz3z3pq9E" target="_blank" class="text-white mx-2"><i class="fab fa-youtube"></i></a>

            <a href="https://www.linkedin.com/in/prime-services-839b92303/" class="text-white mx-2" ><i class="fab fa-linkedin" style="width:10px; height:20px;"></i></a>
        </div>
    </div>
</footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
