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
                    <a class="dropdown-item" href="#">Student Login</a>
                    <a class="dropdown-item" href="#">Employee Login</a>
                    <a class="dropdown-item" href="#">Job-provider Login</a>
                </div>
            </li>
        </ul>
    </div>
</nav>