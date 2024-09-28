<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Vacancies</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        
        /* Custom card style */
        .vacancy-card {
            font-family: Arial, Helvetica, sans-serif;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }

        /* Hover effect for card */
        .vacancy-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Custom button style */
        .custom-btn {
            background-color: #007bff;
            border: none;
            color: #fff;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
          /* Background color for card title */
          .card-title {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-bottom: 15px;
            text-align: center;
        }
        /* Hover effect for button */
       
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
</head>

<br><br><br><br>
<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "tnp_k";
            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch data from the vacancies table
            $sql = "SELECT * FROM vacancies ";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card vacancy-card">
                           <center><h5 class="card-title"><?php echo $row["position"]; ?></h5></center> 
                            <p class="card-text"><strong>Experience:</strong> <?php echo $row["experience"]; ?></p>
                            <p class="card-text"><strong>Location:</strong> <?php echo $row["location"]; ?></p>
                            <p class="card-text"><strong>Salary:</strong> <?php echo $row["salary"]; ?></p>
                            <p class="card-text"><strong>Requirment:</strong> <?php echo $row["recruitment"]; ?></p>
                            <p class="card-text"><class="text-muted"><strong>Deadline:</strong> <?php echo $row["deadline"]; ?></class=></p>
                           <center> <a href="<?php echo $row["apply_link"]; ?>" class="custom-btn" target="_blank">Apply Now</a></center>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "No vacancies available.";
            }

            // Close database connection
            $conn->close();
            ?>
        </div>
    </div>

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

</body>
</html>
