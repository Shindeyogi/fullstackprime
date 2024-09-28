<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: student23.php");
    exit;
}

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

// Get user details
$email = $_SESSION['user_email'];
$sql = "SELECT * FROM registration WHERE t_stud_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit;
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            font-weight: bold;
        }

        .card-text {
            margin-bottom: 10px;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h2 {
            font-size: 2rem;
            font-weight: bold;
            color: #343a40;
        }

        .text-center {
            margin-top: 20px;
        }

        .profile-photo {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        @media (max-width: 576px) {
            .header h2 {
                font-size: 1.5rem;
            }

            .profile-photo {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>

<body>
    <?php include "studentdash5.php"; // Include the dashboard content ?>
    <div class="container">
        <div class="header text-center">
            <h2>Welcome, <?php echo htmlspecialchars($user['t_stud_nm']); ?></h2>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-3 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?php echo htmlspecialchars($user['t_stud_profile']); ?>" class="profile-photo" alt="Profile Photo">
                        <h5 class="card-title">Personal Information</h5>
                        <p class="card-text">Email: <?php echo htmlspecialchars($user['t_stud_email']); ?></p>
                        <p class="card-text">Contact: <?php echo htmlspecialchars($user['t_stud_contact']); ?></p>

                        <h5 class="card-title">Academic Information</h5>
                        <p class="card-text">College Name: <?php echo htmlspecialchars($user['t_clg_name']); ?></p>
                        <p class="card-text">Qualification: <?php echo htmlspecialchars($user['t_qualification']); ?></p>
                    </div>
                </div>
                <!-- <p class="text-center mt-3"><a href="logout.php" class="btn btn-danger">Logout</a></p>-->
            </div>
        </div>
    </div>
</body>

</html>
