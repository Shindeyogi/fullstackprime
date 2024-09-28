<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />

    <style>
        /* Common styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color:#2F4F4F;
            padding-top: 15px;
            transition: width 0.3s;
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .sidebar-toggle {
            left: 5px;
        }

        .sidebar.collapsed .sidebar h2 {
            display: none;
        }

        .sidebar.collapsed a {
            padding: 10px;
            text-align: center;
        }

        .sidebar h2 {
            margin: 0 0 15px;
            font-size: 24px;
            text-align: center;
            background-color: #2F4F4F;
            color: #FFFAF0;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        .sidebar a {
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            color: #ffffff;
            transition: background-color 0.3s ease, color 0.3s ease;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .sidebar a i {
            margin-right: 10px;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #ffffff;
        }

        /* Sidebar toggle button styles */
        .sidebar-toggle {
            position: static;
            top: 15px;
            left: 15px;
            background: #2F4F4F; /* Set background color */
            border: none;
            font-size: 24px;
            color: #ffffff;
            cursor: pointer;
            z-index: 1500;
            display: none; /* Hide the button by default */
            padding: 15px;
            border-radius: 5px;
        }

        /* Content styles */
        .content {
            margin-left: 250px;
            padding: 20px;
        }


        /* profile nav  */

        .content {
            margin: center;
            flex: 1;
            padding: 20px 50px 60px;
            transition: all 0.3s ease;
            padding-left:50px;
            
        }

        .title-bar {
            background-color: #2F4F4F ;
            color: #ffffff;
            padding: 10px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title-bar .welcome-message {
            margin: 0px;
            font-size: 20px;
            padding: 10px;
        }

        .title-bar .profile-info {
            display: flex;
            align-items: center;
        }

        .profile-info img {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .profile-dropdown-toggle {
            color: #ffffff;
            text-decoration: none;
            cursor: pointer;
            position: relative;
        }

        .profile-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #FFFAF0;
            border: 1px solid #ccc;
            border-radius: 4px;

            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: none;
            z-index: 1;
            animation: fadeIn 0.3s ease-in-out;
        }

        .profile-info {
            position: relative;
        }

        .profile-dropdown-toggle {
            background: none;
            border: none;
            cursor: pointer;
        }

        .profile-info:hover .profile-dropdown-menu {
            display: block;
        }

        .profile-dropdown-menu-item {
            display: block;
            padding: 10px 15px;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s ease;
        }

        .profile-dropdown-menu-item:hover {
            background-color: #DCDCDC;
        }

/* Media query for smaller screens */
@media screen and (max-width: 768px) {
    .sidebar {
        width: 100%;
        z-index: 1000;
        position: static;
    }

    .content {
        padding-left: 40px;
    }

    .title-bar {
        flex-direction: column;
        align-items: center; /* Align items to the center for better visibility */
        padding: 20px; /* Increase padding for better spacing horizontally */
        margin-left: 0px; /* Increase margin */
    }

    .title-bar .welcome-message {
        margin: 0px;
        font-size: 20px;
        white-space: nowrap; /* Ensure message stays in a single line */
    }
}



    .profile-info {
        margin-top: 10px;
    }

    .profile-dropdown-menu {
        right: auto;
        left: 0;
        width: 100%; /* Make dropdown menu full width */
        border-radius: 0; /* Remove border radius */
    }

    .profile-dropdown-toggle {
        margin-left: auto; /* Align dropdown toggle to the right */
    }


        @media screen and (max-width: 768px) {
            /* For smaller screens */
            .sidebar {
                display: none; /* Hide the sidebar */
            }

            .content {
                margin-left: 0; /* Reset content margin */
            }

            .sidebar-toggle {
                display: block; /* Show the sidebar toggle button */
            }

            /* Adjust content margin when sidebar is collapsed */
            .sidebar.collapsed ~ .content {
                margin-left: 0;
            }

            .sidebar.collapsed .sidebar a {
                padding: 10px 30px;
                text-align: left;
            }

            /* Adjust position of sidebar toggle button */
            .sidebar-toggle {
                left: 10px;
                margin-top: 10px;
                margin-left: 10px;
            }
        }

        /* Dropdown menu styles */
    .dropdown {
        position: relative;
    }

    .dropdown-toggle {
        display: block;
        padding: 10px 20px;
        color: #ffffff;
        text-decoration: none;
        transition: background-color 0.3s ease, color 0.3s ease;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #FFFAF0; /* Updated background color to pink */
    padding: 10px ;
    border-radius: 5px;
   
}

    .dropdown-menu a {
        display: block;
        padding: 10px 20px;
        color: black;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
        
    }

    .dropdown-menu a:hover {
        background-color: #495057; /* Background color on hover */
    }



    .dashboard {
      display: flex;
      min-height: 100vh;
    }

    .cards-container {
    display: flex;
    padding:10px;
    margin-left:285px;
    max-height: 10px;
    max-width: 850px !important;
    text-align: center;
    justify-content: 15px; /* Adjust as needed */
    gap: 30px; /* Adjust the gap between cards */
    }

  .card {
    flex: 0 0 auto;
    width: 30%; /* Adjust the width based on your preference */
    margin-bottom: 10px;
    height: 200px;
    background-color: rgb(60, 60, 60); /* Card background color */
    border: 1px solid #ddd; /* Border color */
    border-radius: 3px;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); /* Box shadow for a subtle elevation effect */
    transition: 0.3s ease;
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2); /* Box shadow on hover */
}

.card-icon {
    padding: 30px;
    font-size: 24px;
    color: white; /* Icon color */
}

.card-info {
    padding: 0.5px;
}

.card-info h3 {
    margin-top: 0;
    margin-bottom: 10px;
    justify-content: 10px;
    font-size: 20px;
    padding: 5px;
    color: white; /* Heading color */
}

.card-info p.count {
    margin: 0;
    padding: 10px;
    font-size: 18px;
    color: white; /* Count text color */
}

/* Media query for smaller screens */
@media screen and (max-width: 768px) {
    .cards-container {
        flex-wrap: wrap; /* Allow cards to wrap to the next line */
        margin-left: 0; /* Reset left margin */
        justify-content: center; /* Center cards horizontally */
    }

    .card {
        width: calc(50% - 20px); /* Two cards per row with some margin */
        margin: 10px; /* Add some margin between cards */
    }
}

</style>
</head>

<body>
    <!-- Sidebar toggle button -->
    <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>

       
        <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="fas fa-building"></i> Centers
        </a>
            <div class="dropdown-menu">
                <a href="centers.php">Add Center</a>
                <a href="center_en_fetch.php">View Center</a>
            </div>
        </div>


        <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="fas fa-chalkboard-teacher"></i> Trainers
        </a>
            <div class="dropdown-menu">
                <a href="trainer.php">Add Trainer</a>
                <a href="trainer_fetch.php">View Trainer</a>
            </div>
        </div>

         <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="fas fa-user-tie"></i> Employee
        </a>
            <div class="dropdown-menu">
                <a href="add_employe.php">Add Employee</a>
                <a href="ad_emp_fetch.php">View Employee</a>
                
            </div>
        </div>

        <div class="dropdown">
        <a href="job_provider_fetch.php" class="dropdown">
            <i class="fas fa-briefcase"></i>Job Provider
        </a>
            <!-- <div class="dropdown-menu">
                <a href="job_provider.php">Add Job</a>
                <a href="job_provider_fetch.php">View Job</a>
            </div> -->
        </div>

        <div class="dropdown">
        <a href="stud_fetch.php" class="dropdown">
            <i class="fas fa-graduation-cap"></i> Student
        </a>
            <!-- <div class="dropdown-menu">
                <a href="#">Add Student</a>
                <a href="#">View Student</a>
            </div> -->
        </div>

        <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="fas fa-book"></i> Courses
        </a>
            <div class="dropdown-menu">
                <a href="course.php">Add Courses</a>
                <a href="course_fetch.php">View Courses</a>
            </div>
        </div>

        <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="fas fa-laptop icon"></i> Internship
        </a>
            <div class="dropdown-menu">
                <a href="internship.php">Add Internship</a>
                <a href="intern_fetch_en.php">View Internship</a>
            </div>
        </div>
        
        <div class="dropdown">
        <a href="#" class="dropdown-toggle">
            <i class="fas fa-images"></i> Gallery
        </a>
            <div class="dropdown-menu">
                <a href="gallery.php">Add Images</a>
                <a href="gallery_en_fetch.php">View Images</a>
            </div>
        </div>

        <div class="dropdown">
        <a href="#" class="dropdown">
            <i class="fas fa-calendar-day"></i> Event
        </a>
            <div class="dropdown-menu">
                <a href="event.php">Add Event</a>
                <a href="event_en_fetch.php">View Event</a>
            </div>
        </div>

        <div class="dropdown">
        <a href="coursenq_fetch.php" class="dropdown">
            <i class="fas fa-comment"></i>Course Enquiry
        </a>
        </div>

        <div class="dropdown">
        <a href="hm_enq_fetch.php" class="dropdown">
            <i class="fas fa-address-book"></i>Contact Enquiry
        </a>
            
        </div>

        <div class="dropdown">
        <a href="placement.php" class="dropdown">
            <i class="fas fa-briefcase"></i>Placement
        </a>
     </div>
    </div>

    <!-- Content -->
    <div class="content">
        <!-- Your content goes here -->
        <div class="title-bar">
                <h2 class="welcome-message">Welcome to Admin Dashboard</h2>
                <div class="profile-info">
                    <img src="https://randomuser.me/api/portraits/men/1.jpg" alt="User Image">
                    <span>Profile</span>
                    <button class="profile-dropdown-toggle"><i class="fas fa-caret-down"></i></button>
                    <div class="profile-dropdown-menu">
                        <a href="#" class="profile-dropdown-menu-item">Profile</a>
                        <a href="#" class="profile-dropdown-menu-item">Logout</a>  
                    </div>
                </div>
            </div>
    </div>


    <div class="dashboard">
    <div class="cards-container">
    <div class="card" style="background-color: #007bff;">
        <div class="card-icon"><i class="fas fa-building"></i></div>
        <div class="card-info">
            <h3>Centers</h3>
            <p class="count" id="centers-count">Loading...</p>
        </div>
    </div>
    <div class="card" style="background-color: #28a745;">
        <div class="card-icon"><i class="fas fa-user-tie"></i></div>
        <div class="card-info">
            <h3>Employee</h3>
            <p class="count" id="employee-count">Loading...</p>
        </div>
    </div>
    <div class="card" style="background-color: #dc3545;">
        <div class="card-icon"><i class="fas fa-briefcase"></i></div>
        <div class="card-info">
            <h3>Recruiter</h3>
            <p class="count" id="recruiter-count">Loading...</p>
        </div>
    </div>
    <div class="card" style="background-color: #ffc107;">
        <div class="card-icon"><i class="fas fa-graduation-cap"></i></div>
        <div class="card-info">
            <h3>Student</h3>
            <p class="count" id="student-count">Loading...</p>
        </div>
    </div>
    <div class="card" style="background-color: #6610f2;">
        <div class="card-icon"><i class="fas fa-briefcase"></i></div>
        <div class="card-info">
            <h3>Placement</h3>
            <p class="count" id="placement-count">Loading...</p>
        </div>
    </div>
    <!-- Add more cards here -->
</div>
    </div>
    </div>
    <script>
 
  // Assume you have a function fetchData() that fetches data from an API or any data source

    // Example function to simulate fetching data
    function fetchData() {
        // Simulate fetching data
        setTimeout(() => {
            // Mock data (replace this with your actual data)
            const data = {
                centersCount: 100,
                employeeCount: 50,
                recruiterCount: 20,
                studentCount: 30,
                placementCount: 80
            };

            // Update the counts in the cards
            document.getElementById('centers-count').textContent = data.centersCount;
            document.getElementById('employee-count').textContent = data.employeeCount;
            document.getElementById('recruiter-count').textContent = data.recruiterCount;
            document.getElementById('student-count').textContent = data.studentCount;
            document.getElementById('placement-count').textContent = data.placementCount;
        }, 1000); // Simulate 1 second delay for fetching data
    }

    // Call the fetchData function to populate the counts
    fetchData();

    document.addEventListener('DOMContentLoaded', function () {
    var toggleSidebarBtn = document.getElementById('toggle-sidebar');
    var sidebar = document.getElementById('sidebar');

    var dropdownToggles = document.querySelectorAll('.dropdown-toggle');
            dropdownToggles.forEach(function(toggle) {
                toggle.addEventListener('click', function() {
                    var dropdownMenu = toggle.nextElementSibling;
                    dropdownMenu.classList.toggle('active');
                });
            });


            // Close dropdown menus when clicking outside of them
            document.addEventListener('click', function (event) {
                if (!sidebar.contains(event.target)) {
                    dashboardDropdown.classList.remove('active');
                }
            });
        });
   
  </script>




    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            // Toggle sidebar when the toggle button is clicked
            $(".sidebar-toggle").click(function () {
                $(".sidebar").toggle(); // Toggle the visibility of the sidebar
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
