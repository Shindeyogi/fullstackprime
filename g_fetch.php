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


// SQL query to fetch all data from 'gallery' table
$sql = "SELECT * FROM gallery where status='1'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<style>
        /* Additional CSS for hover effect */
        .card {
            transition: transform 0.3s ease;
            height: auto;
            width: 100%;
        }
        .card:hover {
            transform: translateY(-5px); /* Slightly pop up on hover */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }
         /* Additional CSS for overlay description */
         .card {
            position: relative;
            overflow: hidden;
        }
        .card .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.7); /* Light shade overlay */
            padding: 10px;
        }
        .card-text {
            color: #000;
            font-weight: bold;
            text-align: center;
        }
        .card-img-top {
            max-width: 100%; /* Ensure the image doesn't exceed the card width */
            height: auto; /* Maintain aspect ratio */
            object-fit: cover; /* Cover the entire space, cropping as needed */
        }
    </style>

<html lang="en">
<div class="container mt-5">
<div class="row">
<?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-md-6 col-lg-4 mb-3">';
                    echo '<div class="card">';
                    // Display the image
                    echo '<img src="' . htmlspecialchars($row["t_gallery_img"]) . '" class="card-img-top" alt="Event Image">';
                    // Overlay with description
                    echo '<div class="overlay">';
                    echo '<div class="card-text">' . htmlspecialchars($row["t_gallery_desc"]) . '</div>';
                    echo '</div>'; // overlay
                    echo '</div>'; // card
                    echo '</div>'; // col
                }
            } else {
                echo '<div class="col-12"><p class="text-center">No records found</p></div>';
            }
            ?>
</div>
</div>
</html>