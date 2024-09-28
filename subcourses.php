<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sub Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        /* CSS for the Courses Section */
        .container {
            margin-top: 100px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
            margin-bottom: 20px;
            overflow: hidden;
            position: relative;
        }

        .card:hover .card-body {
            background-color: rgba(0, 0, 0, 0.05);
        }

        .card:hover .card-header {
            color: #333;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            width: 100%;
            height: auto;
            border-radius: 10px 10px 0 0;
            object-fit: cover;
        }

        .card-header {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .card-body {
            padding: 1rem;
            border-radius: 0 0 10px 10px;
        }

        .card-text {
            font-size: 1rem;
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
    <main class="container">
        <div class="row">
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

            if (isset($_GET['course_name'])) {
                $course_name = $_GET['course_name'];

                // Query to fetch subcourses data
                $sql = "SELECT course_name, start_date, instructor, duration, image1  FROM courses WHERE course_name='$course_name' ";
                $result = mysqli_query($conn, $sql);

                

                // Check if data is fetched successfully
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-lg-4 col-md-6 mb-4">';
                        echo '<div class="card">';
                        echo '<img src="' . $row["image1"] . '" class="card-img-top" alt="courses Image">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-header">' . $row["course_name"] . '</h5>';
                        echo '<p class="card-text">Instructor: ' . $row["instructor"] . '</p>';
                        echo '<p class="card-text">Start Date: ' . $row["start_date"] . '</p>';
                        echo '<p class="card-text">Duration: ' . $row["duration"] . ' hours</p>';
                        echo '<div class="text-center"><a href="download_syllabus.php" class="btn btn-primary">Download Syllabus</a></div>';
                        echo '<div class="text-center mt-2"><a href="student23.php?course_name=' . urlencode($row["course_name"]) . '" class="btn btn-success">Enroll</a></div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    // Error handling if query fails
                    echo "Error fetching subcourses: " . mysqli_error($conn);
                }
                // Close database connection
                mysqli_close($conn);
            }
            ?>
        </div>


    </main>

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




    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Handle click event on enroll button
            var enrollBtns = document.querySelectorAll('.enroll-btn');
            enrollBtns.forEach(function(btn) {
                btn.addEventListener('click', function() {
                    // Display the enroll form
                    alert('Enroll button clicked');
                });
            });
        });
    </script>
</body>
</html>
