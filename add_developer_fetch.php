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

// SQL query to fetch all data from 'developers' table
$sql = "SELECT * FROM developers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Team</title>
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrQkTyDdZO6d9J8C4OHT+T2B2eN5ntr6to5YkJd9xl5NZWf+Pyf6Lo9V0sP1xQ+WZ2D1GuzPq+rn5xEaXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Developer Team</title>

    <style>
         body {
            font-family: Arial, sans-serif;
        }

        .developer-carousel-container {
            overflow: hidden;
            width: 100%;
            margin: 20px auto;
            position: relative;
        }

        .developer-carousel {
            display: flex;
            white-space: nowrap;
            animation: scroll 25s linear infinite;
        }

        .developer-card {
            border: 2px solid #ccc;
            border-radius: 10px;
            padding: 15px;
            margin: 15px;
            width: 320px;
            height: 300px;
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: transform 0.3s, box-shadow 0.3s;
            flex-shrink: 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add shadow */
        }

        .developer-card img {
            max-width: 100px;
            height: 100px;
            border-radius: 50%;
            display: block;
            margin-bottom: 15px;
        }

        .developer-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: scale(1.05);
        }

        .developer-card h2, .card p {
            margin: 5px 0;
            font-size: 16px;
            text-align: center;
        }

        .developer-card h2 i, .card p i {
            margin-right: 5px;
        }

        .developer-carousel-buttons {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
        }

        .developer-carousel-buttons button {
            background: rgba(0, 0, 0, 0.5);
            border: none;
            color: white;
            padding: 10px;
            cursor: pointer;
        }

        .developer-carousel-buttons button:focus {
            outline: none;
        }

        .developer-carousel-buttons button:hover {
            background: rgba(0, 0, 0, 0.7);
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        .internship-card {
    margin-bottom: 20px;
}

    </style>
</head>
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
                    <a class="nav-link" href="add_developer_fetch.php">Internships</a>
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
<Br>
<br>
<br>
<main class="container">
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card shadow-sm rounded internship-card">
                <div class="card-header bg-dark text-white">
                    <h3>About Internship</h3>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="img/internship.png" alt="What is Internship" style="max-width: 80%; height: auto; border: none;" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">
                                Explore real-world projects under the mentorship our esteemed Corporate Trainers. Here, students work on live projects with guidance from senior teams. The internship includes a technical interview, HR interview, and a final meeting with the technical management team for selected candidates. A minimum 3-month commitment is required, and successful interns receive an Internship Certificate.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card shadow-sm rounded internship-card">
                <div class="card-header bg-dark text-white">
                    <h3>About Stipend</h3>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="img/stipend.png" alt="Stipend" style="max-width: 80%; height: auto; border: none;" class="img-fluid rounded">
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">
                                Stipends are awarded to candidates handling clients independently. Choose from technologies like Full Stack Development, App Development, Digital Marketing, Data Science, HR Management, and Entrepreneur Skill Development. Opportunities for recruitment may follow a successful internship.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 mb-4">
            <div class="card shadow-sm rounded internship-card">
                <div class="card-header bg-dark text-white">
                    <h3>Internship Documentation Requirements</h3>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-4">
                            <img src="img/doc.png" alt="Documents" style="max-width: 40%; height: auto; border: none;" class="img-fluid">
                        </div>
                        <div class="col-md-8">
                            <ul>
                                <li>Submit 2 photos.</li>
                                <li>Aadhar card Xerox.</li>
                                <li>Last Educational Xerox certificate.</li>
                                <li>2 copies of the resume.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<body>
    <div class="developer-carousel-container">
    <h2 style="text-align: center; color: #02236d; font-weight: bold;">Developers Team</h2>
        <div class="developer-carousel">
            <?php
            // Fetch data from the database and display in cards
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="developer-card" style="width: 350px; height: 350px;">'; // Increased card size
        echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['full_name']) . '" style="max-width: 120px; height: 120px;">'; // Increased image size
        echo '<h2 style="color: black;"><i class="fa-solid fa-user"></i> <strong style="color: #02236d;">Name:</strong> ' . htmlspecialchars($row['full_name']) . '</h2>'; // Changed name color
        echo '<p><strong style="color: #02236d;">Role:</strong>&nbsp;&nbsp;' . htmlspecialchars($row['role']) . '</p>'; // Changed role color and added space after name
        echo '<p><strong style="color: #02236d;">Qualification:</strong> ' . htmlspecialchars($row['qualification']) . '</p>'; // Changed qualification color
        echo '</div>';
                }
            } else {
                echo "No developers found.";
            }
            $conn->close(); // Close the connection after fetching the data
            ?>
        </div>
    </div>
</body>
<br>
<br>
<br>
<br>
<br>

<style>
    .footer {
    background-color: #02236d; /* Set background color */
    color: white; /* Set text color */
    position: fixed;
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
</html>






