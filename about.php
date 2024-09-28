
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        html {
            scroll-behavior: smooth;
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
                    <a class="nav-link" href="#courses">Courses</a>
                </li> 
                <li class="nav-item active">
                    <a class="nav-link" href="placement_fetch.php">Placement</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="about.php">About us</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="center_fetch.php">Franchies</a>
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
                        <a class="dropdown-item" href="#">Job_provider Login</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <br>

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
                            Welcome to the Placement Management System by Sanity! We're dedicated to making the job search and recruitment process easy and efficient for everyone involved.Job seekers can access a wide range of job opportunities across different industries with our
                            user-friendly platform. Our advanced search options help you find the perfect match, and we provide resources to help you improve your resume and ace interviews. Additionally, we offer courses to enhance your skills.
                        </p>
                        <p style="text-align: justify;">Employers can streamline recruitment by posting vacancies, reviewing applications, and managing candidates all in one place. We focus on quality and professionalism, ensuring you have access to top talent.Whether you're a job seeker
                            or employer, Sanity's Placement Management System is here to help. Thank you for choosing us for your professional development and recruitment needs.
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

    <br>

    <footer>
        <h5 class="p-3 bg-dark text-white text-center">&copy;2024 Placement Management System. All rights reserved.
            <!-- Instagram Icon -->
            <a href="https://www.instagram.com/your_instagram_username" target="_blank" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <!-- Facebook Icon -->
            <a href="https://www.facebook.com/your_facebook_page" target="_blank" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
            <!-- YouTube Icon -->
            <a href="https://www.youtube.com/your_youtube_channel" target="_blank" class="text-white mx-2"><i class="fab fa-youtube"></i></a>
            <!-- Another Social Media Icon (e.g., Twitter) -->
            <a href="https://twitter.com/your_twitter_handle" target="_blank" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
        </h5>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+DVsO2/p7O4b4AHfF6Wq2qqq4JukR5+8a6E21Qc" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-KY+QN54PsR9ad76N3vRmXlTx5lrZMdLx9dmJwG8XBg5Fmm1+OIgFYX6WrplDHBd/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-dRD92qerqI6zBPmVR5nOjEQjDnwcB+q4FoUeWjyiV8Jrpa9m+1nH80jPLovXsTSD" crossorigin="anonymous"></script>

    <!-- Smooth Scroll -->
    <script>
        $('a[href*="#"]').on('click', function(e) {
            e.preventDefault()

            $('html, body').animate({
                    scrollTop: $($(this).attr('href')).offset().top,
                },
                500,
                'linear'
            )
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>

</html>