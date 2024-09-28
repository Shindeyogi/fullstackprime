<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internship Details</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 100%; /* Change height to 100% */
        object-fit: cover; /* Adjust image to cover the entire space */
    }
        }

        .card-title {
            color: #333;
            font-weight: bold;
            font-size: 24px; /* Adjust title font size */
        }

        .card-text {
            color: #666;
            font-size: 16px; /* Adjust text font size */
        }

        .field-icon {
            margin-right: 10px;
            color: #007bff; /* Adjust icon color as needed */
        }
    </style>
</head>
<body>
<style>
        /* Navigation bar background color */
        
        .navbar {
            background-color: #ffffff;
            /* Change the color as needed */
        }
        /* Navigation links */
        
        .navbar-nav .nav-link {
            color: #02236d;
            /* Change the color as needed */
            font-weight: bold;
            /* Make the text bold */
            padding: 10px 15px;
            /* Add padding to the links */
        }
        /* Active link */
        
        .navbar-nav .nav-item.active .nav-link {
            color: #02236d;
            /* Change the color for active links */
        }
        /* Dropdown menu */
        
        .dropdown-menu {
            background-color: white;
            /* Change the background color of dropdown menu */
            border: 1px solid #dddddd;
            /* Add border to the dropdown menu */
        }
        /* Dropdown items */
        
        .dropdown-menu .dropdown-item {
            color: #02236d;
            /* Change the color of dropdown items */
            font-weight: bold;
            /* Make the text bold */
        }
        /* Navbar toggler icon color */
        
        .navbar-toggler-icon {
            color: #02236d;
            /* Change the color of the toggler icon */
        }
        /* Adjust margin-right for the navbar-toggler */
        
        .navbar-toggler {
            margin-right: 15px;
            /* Add margin-right for spacing */
        }
        
        img {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
            width: 350px;
        }
        
        .center-heading {
            text-align: center;
            color: #02236d;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        h1 {
            font-family: Arial, Helvetica, sans-serif;
            font-style: cambria;
            color: #02236d;
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
                    <a class="nav-link" href="internship_fetch.php">Internships</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="gallery_fetch.php">Gallery</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="bootcamp_fetch.php">Events</a>
                </li>
                <li class="nav-item active dropdown">
                    <a class="nav-link" href="courses_hm.php">Courses</a>
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
        


<div class="container mt-5">
    <div class="row justify-content-center">
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

// Retrieve internship ID from the URL parameter
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $internship_id = $_GET['id'];

    // SQL query to fetch internship details based on ID
    $sql = "SELECT * FROM internships WHERE id = $internship_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of the specific internship
        $row = $result->fetch_assoc();
?>
        <div class="col-md-6">
            <div class="card">
                <img src="<?php echo htmlspecialchars($row["image"]); ?>" class="card-img-top" alt="Internship Image">
                <div class="card-body">
                    <h5 class="card-title"><?php echo htmlspecialchars($row["internship"]); ?></h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt field-icon"></i><strong>Location:</strong> <?php echo htmlspecialchars($row["location"]); ?></p>
                    <p class="card-text"><i class="far fa-clock field-icon"></i><strong>Duration:</strong> <?php echo htmlspecialchars($row["duration"]); ?></p>
                    <p class="card-text"><i class="fas fa-calendar-alt field-icon"></i><strong>Start Date:</strong> <?php echo htmlspecialchars($row["start_date"]); ?></p>
                    <p class="card-text"><i class="fas fa-clipboard-list field-icon"></i><strong>Requirements:</strong> <?php echo htmlspecialchars($row["requirements"]); ?></p>
                    <p class="card-text"><i class="fas fa-info-circle field-icon"></i><strong>About Us:</strong> <?php echo htmlspecialchars($row["about_us"]); ?></p>
                    <!-- Add more details as needed -->
                </div>
            </div>
        </div>
<?php
    } else {
        echo '<p class="col-12 text-center">No internship found with the provided ID.</p>';
    }
} else {
    echo '<p class="col-12 text-center">Invalid request. Please provide an internship ID.</p>';
}

// Close the database connection
$conn->close();
?>
    </div>
</div>
<br>
<style>
    .footer {
    background-color: #02236d; /* Set background color */
    color: white; /* Set text color */
    
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
            <!-- LinkedIn Icon -->
            <a href="https://www.linkedin.com/in/prime-services-839b92303/" class="text-white mx-2"><i class="fab fa-linkedin" style="width:10px; height:20px;"></i></a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
