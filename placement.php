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
            background-color: #2F4F4F;
            padding-top: 15px;
            transition: width 0.3s;
            overflow-y: auto;
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
            background: #2F4F4F;
            /* Set background color */
            border: none;
            font-size: 24px;
            color: #ffffff;
            cursor: pointer;
            z-index: 1500;
            display: none;
            /* Hide the button by default */
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
            padding-left: 50px;
        }

        .title-bar {
            background-color: #2F4F4F;
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
                align-items: center;
                /* Align items to the center for better visibility */
                padding: 20px;
                /* Increase padding for better spacing horizontally */
                margin-left: 0px;
                /* Increase margin */
            }

            .title-bar .welcome-message {
                margin: 0px;
                font-size: 20px;
                white-space: nowrap;
                /* Ensure message stays in a single line */
            }

            .profile-info {
                margin-top: 10px;
            }

            .profile-dropdown-menu {
                right: auto;
                left: 0;
                width: 100%;
                /* Make dropdown menu full width */
                border-radius: 0;
                /* Remove border radius */
            }

            .profile-dropdown-toggle {
                margin-left: auto;
                /* Align dropdown toggle to the right */
            }

            /* For smaller screens */
            .sidebar {
                display: none;
                /* Hide the sidebar */
            }

            .content {
                margin-left: 0;
                /* Reset content margin */
            }

            .sidebar-toggle {
                display: block;
                /* Show the sidebar toggle button */
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
            background-color: #FFFAF0;
            /* Updated background color to pink */
            padding: 10px;
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
            background-color: #495057;
            /* Background color on hover */
        }

        .dashboard {
            display: flex;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <!-- Sidebar toggle button -->
    <button class="sidebar-toggle"><i class="fas fa-bars"></i></button>

    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Dashboard</h2>

        <!-- Dropdown menu items -->
        <div class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fas fa-building"></i> Tie-up Comapny
            </a>
            <div class="dropdown-menu">
                <a href="comp_tieup.php">Add Company</a>
                <a href="comp_tie_fetch.php">View Company</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fas fa-chalkboard-teacher"></i> Student Placed
            </a>
            <div class="dropdown-menu">
                <a href="no_std_placed.php">Add Student</a>
                <a href="no_stdplace_fetch.php">View Student</a>
            </div>
        </div>

        <div class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fas fa-user-tie"></i> Ongoing Placement
            </a>
            <div class="dropdown-menu">
                <a href="plac_opening.php">Add Placement</a>
                <a href="plac_open_fetch.php">View Placement</a>
                
            </div>
        </div>

        

        <!-- Rest of the dropdown menus -->

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
