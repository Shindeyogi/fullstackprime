<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my project</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"type="text/css" href="css/style.css">
    <link rel="stylesheet"type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
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

    /* Adjust margin-right for the navbar-toggler */
    
    
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
                <li class="nav-item active">
                    <a class="nav-link" href="">More</a>
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
<body>


<div id="demo" class="carousel slide" data-ride="carousel" data-interval="3000">
<marquee behavior="scroll" direction="left" style="background-color: black; color: white;">
🚀 Exciting internship opportunities available now! Explore our latest internships and kick-start your career journey today. Don't miss out, apply now!
</marquee>
<section class="Sliderimg" id="Sliderimg">
    <div class="text-center">
            <?php include 'sliderimg_fetch.php'; ?>
        </div>
    </section>      

  
<style>
.about-us {
    padding: 0px 0;
}

.about-us .text {
    flex: 1;
    padding: 0 20px;
    color: #02236d;
}

.about-us img {
    width: 150%;
    height: 300px;
    border-radius: 15px;
}

.about-us h1 {
    color: #02236d;
    font-size: 2.5rem;
    margin-bottom: 20px;
}

.about-us p {
    color: #666;
    line-height: 1.6;
    font-size: 1.1em;
}

h2 {
    font-family: Arial, Helvetica, sans-serif;
    font-style: cambria;
    color: rgb(135, 165, 235);
}

</style>
<!-- about us -->

<section class="about-us" id="about-us">
        <div class="text-center">
            <h1 class="m-5"><span class="letter">A</span>bout <span class="letter">U</span>s</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="text">
                        <p style="text-align: justify;">
                        Welcome to the Placement Management System by Sanity! We're dedicated to making the job search and recruitment process easy and efficient for everyone involved.Job seekers can access a wide range of job opportunities across different industries with our user-friendly platform. Our advanced search options help you find the perfect match, and we provide resources to help you improve your resume and ace interviews. Additionally, we offer courses to enhance your skills.
                        </p>
                        <p style="text-align: justify;">Employers can streamline recruitment by posting vacancies, reviewing applications, and managing candidates all in one place. We focus on quality and professionalism, ensuring you have access to top talent.Whether you're a job seeker or employer, Sanity's Placement Management System is here to help. Thank you for choosing us for your professional development and recruitment needs.
                        </p>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="image">
                        <img src="img\about-us.png" alt="About Us Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Events-->
    <style>
.image-frame {
    width: 100%; /* Ensure card fills the entire width */
    height: auto; /* Allow card height to adjust based on content */
}

.card {
    height: auto; /* Make sure card fills the entire height of its container */
    border: 1px solid #ddd; /* Add border to card if needed */
    border-radius: 10px; /* Add border radius to card */
    width: 100%;
}

.card-img-top {
    width: 100%; /* Ensure image fills the entire width of the card */
    height: auto; /* Allow image height to adjust based on aspect ratio */
}

    .Events h1 {
        color: #02236d;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }
    </style>
       
    <section class="Events" id="events">
    <div class="text-center">
            <h1 class="m-5"><span class="letter">E</span>vents</h1>
            <?php include 'event_fetch.php'; ?>
        </div>
    </section>
   
    <style>

        .Internship h1{
        color: #02236d;
        font-size: 2.5rem;
        margin-bottom: 20px;
        }

    </style>

    <section class="Internship" id="Internship">
    <div class="text-center">
            <h1 class="m-5"><span class="letter">I</span>nternships</h1>
            <?php include 'internship_hm.php'; ?>
        </div>
    </section>
    
<style>
    /* Courses */
    .courses .text {
        flex: 1;
        padding: 0 20px;
        color: #02236d;
    }

    .courses h1 {
        color: #02236d;
        font-size: 2.5rem;
        margin-bottom: 10px;
    }

    .courses img {
        width: 100%;
        height: 300px; /* Equal height for all images */
        border-radius: 15px; /* Rounded corners */
    }
    .courses{
        margin-top: 10px;
        padding: auto;
    }

  </style>
    <!-- Course Section -->
    <section class="courses" id="courses">
        <h1 class="text-center mb-5"><span class="letter">O</span>ur <span class="letter">C</span>ourses</h1>
        <div class="container">
        <div class="row">
        <?php include 'courses_hm.php'; ?>
        </div>
        </div>
    </div>
</section>

<style>
    /* Gallery */
    .gallery {
        padding: 0px 0;
    }

    .gallery .text {
        flex: 1;
        padding: 0 20px;
        color: #02236d;
    }

    .gallery h1 {
        color: #02236d;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .gallery img {
        width: 100%;
        height: 300px; /* Equal height for all images */
        border-radius: 15px; /* Rounded corners */
    }
  </style>

 <section class="gallery" id="gallery" >
        <div class="text-center">
            <h1 class="m-5"><span class="letter">G</span>allery</h1>
        </div>
        <?php include 'g_fetch.php'; ?>
        <div class="row">
            </div>
</section>
<br>

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

// Fetch data from the com_tieup table
$sql_tieups = "SELECT company_name, company_logo, website FROM com_tieup where status='1'";
$result_tieups = $conn->query($sql_tieups);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Logos Carousel</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .carousel-container {
            overflow: hidden;
            white-space: nowrap;
            width: 100%;
        }

        .carousel-images {
            display: inline-block;
            white-space: nowrap;
            animation: scroll 15s linear infinite;
        }

        .carousel-images img {
            max-height: 100px;
            margin: 0 10px;
            display: inline-block;
        }

        @keyframes scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
    </style>
</head>

<body>
    <div class="carousel-container">
        <div class="carousel-images">
        <?php
            if ($result_tieups->num_rows > 0) {
                while ($row = $result_tieups->fetch_assoc()) {
                    echo "<a href='" . htmlspecialchars($row["website"]) . "' target='_blank'>";
                    echo "<img src='" . htmlspecialchars($row["company_logo"]) . "' alt='" . htmlspecialchars($row["company_name"]) . " Logo' class='company-logo'>";
                    echo "</a>";
                }
            } else {
                echo "<p>No company tie-ups available at the moment.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
<br>

<!-- Contact Section -->
<style>
.google-map {
        position: relative;
        overflow: hidden;
    }

    /* Style for the iframe containing the map */
    #map {
        width: 100%;
        height: 500px; /* Set the height of the map container */
        border: none; /* Remove border from the iframe */
    }
    .contact-us h1 {
        color: #02236d;
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    </style>

<section class="contact-us">
    <div class="container">
        <div class="text-center">
            <h1><span class="letter">C</span>ontact <span class="letter">U</span>s</h1>
            <p>Feel free to reach out to us for any inquiries or assistance.</p>

            <div class="row">
                <!-- Location on the left side -->
                <div class="col-md-6">
                <div class="google-map position-relative">
                        <iframe id="map" width="100%" height="500" frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d476.9662170573857!2d73.84810304454992!3d18.509031103383844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c073767f8aa7%3A0xe3e6073f4930a151!2sprime%20infotech%20solutions!5e0!3m2!1sen!2sin!4v1711514516078!5m2!1sen!2sin"
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <!-- Contact form on the right side -->
                <div class="col-md-6">
                    <?php include 'hmenq.php' ?>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<section>
    <style>
        .info-item {
            padding: 10px;
            height: 180px;
            border: 2px solid black;
            border-color: #02236d;
            border-radius: 20px;
            margin: 0 10px;
            width: 30%;
            margin-bottom: 20px; /* Added margin-bottom to uplift from footer */
        }

        .item-body {
            border-radius: 20px;
            padding: 10px;
            text-align: center;
            color: blue;
        }

        .item-body h3 {
            margin-bottom: 10px;
            color: blue;
        }

        .item-body p {
            margin-top: 10px;
            color: blue;
        }

        .item-body a {
            margin-top: 10px;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 20px;
            color: blue;
        }

        .info-item-wrapper {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
    </style>

    <div class="info-item-wrapper">
        <div class="info-item">
            <div class="item-body">
                <h3>
                    <img src="img\icons8-location-40.png" alt="Location Icon" style="width: 40px; height: 40px; display: block; margin: 0 auto; ">
                </h3>
                <p>
                    <a href="https://www.google.com/maps/search/?api=1&amp;query=2nd+Floor,+Madhav+Heritage,+Lokmanya+Bal+Gangadhar+Tilak+Rd,Sadashiv+Peth,+Pune,+Maharashtra+411030" target="_blank" style="text-decoration:none;">2nd Floor, Madhav Heritage, Lokmanya Bal Gangadhar Tilak Rd, Sadashiv Peth, Pune, Maharashtra 411030"</a>
                </p>
            </div>
        </div>

        <div class="info-item">
            <div class="item-body">
                <h2>
                    <img src="img\icons8-email-40.png" alt="Mail Icon" style="width: 40px; height: 40px; display: block; margin: 0 auto; ">
                </h2>
                <a href="mailto:“ltorpune@gmail.com”" style="text-decoration:none;">ltorpune@gmail.com </a>
            </div>
        </div>

        <div class="info-item">
            <div class="item-body">
                <h3>
                    <img src="img\receiver.png" alt="Contact Icon" style="width: 40px; height: 40px; display: block; margin: 0 auto;">
                </h3>
                <p>
                    <a href="tel:+919403090958" style="text-decoration:none;">+91 - 9403090958</a>
                    <br>
                    <a href="tel:+919309907928" style="text-decoration:none;">+91 - 9309907928</a><br>
                    <a href="tel:+919038546718" style="text-decoration:none;">+91 - 9422301684</a>
                </p>
            </div>
        </div>
    </div>
</section>



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



<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+DVsO2/p7O4b4AHfF6Wq2qqq4JukR5+8a6E21Qc"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-KY+QN54PsR9ad76N3vRmXlTx5lrZMdLx9dmJwG8XBg5Fmm1+OIgFYX6WrplDHBd/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"
        integrity="sha384-dRD92qerqI6zBPmVR5nOjEQjDnwcB+q4FoUeWjyiV8Jrpa9m+1nH80jPLovXsTSD"
        crossorigin="anonymous"></script>

    <!-- Smooth Scroll -->
    <script>
        $('a[href*="#"]').on('click', function (e) {
            e.preventDefault()

            $('html, body').animate(
                {
                    scrollTop: $($(this).attr('href')).offset().top,
                },
                500,
                'linear'
            )
        })
        $(window).on('scroll', function () {
    var scrollTop = $(this).scrollTop();

    // Check if the user has scrolled past a certain point (e.g., 100 pixels)
    if (scrollTop > 100) {
        // Add the "scrolled" class to the navbar
        $('.navbar').addClass('scrolled');
        // Add the "scrolled" class to the carousel
        $('.carousel').addClass('scrolled');
    } else {
        // Remove the "scrolled" class from the navbar
        $('.navbar').removeClass('scrolled');
        // Remove the "scrolled" class from the carousel
        $('.carousel').removeClass('scrolled');
    }
});


    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    




</body>

</html>









