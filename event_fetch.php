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

// SQL query to fetch all data from 'events' table
$sql = "SELECT * FROM events where status='1'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
    /* Custom CSS for the card */
    .card {
        border: 1px solid #ccc;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease-in-out;
    }

    .card:hover {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        margin-bottom: 0.5rem;
    }

    .card-text {
        font-size: 1rem;
    }

    /* Set card image to fill the entire card */
    .card-img-top {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 8px 8px 0 0; /* Ensure rounded corners on the top */
    }

    /* Style adjustments for card body */
    .card-body {
        padding: 1rem;
    }
</style>


</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-4 mb-3">';
                    echo '<div class="card">';
                    echo '<img src="' . htmlspecialchars($row["event_image"]) . '" class="card-img-top" alt="Event Image">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . htmlspecialchars($row["event_name"]) . '</h5>';
                    echo '<p class="card-text"><strong>Location:</strong> ' . htmlspecialchars($row["event_location"]) . '</p>';
                    echo '<p class="card-text"><strong>Start Date:</strong> ' . htmlspecialchars($row["start_date"]) . '</p>';
                    echo '</div>'; // card-body
                    echo '</div>'; // card
                    echo '</div>'; // col
                }
            } else {
                echo '<div class="col-12"><p class="text-center">No records found</p></div>';
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
