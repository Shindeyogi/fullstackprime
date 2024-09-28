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

$sql = "SELECT image1,course_name,start_date,instructor,duration FROM courses ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-4 mb-3">';
        echo '<div class="card">';
        echo '<img src="' . htmlspecialchars($row["image1"]) . '" class="card-img-top" alt="Course Image" style="height: 300px; width: 200px object-fit: cover;">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . htmlspecialchars($row["course_name"]) . '</h5>';
        echo '<p class="card-text"><strong>Start date:</strong> ' . htmlspecialchars($row["start_date"]) . '</p>';
        echo '<p class="card-text"><strong>Instructor:</strong> ' . htmlspecialchars($row["instructor"]) . '</p>';
        echo '<p class="card-text"><strong>Duration:</strong> ' . htmlspecialchars($row["duration"]) . '</p>';
        echo '<div class="card-body">';
        echo '<a href="#" class="btn btn-primary">Download Syllabus</a>';
        echo '</div>'; // card-body
        echo '</div>'; // card
        echo '</div>'; // col
    }
} else {
    echo '<div class="col-12"><p class="text-center">No records found</p></div>';
}

?>
<style>
    .footer {
        background-color: #02236d; /* Set background color */
        color: white; /* Set text color */
        position: relative;
        bottom: 0;
        width: 100%;
        padding: 10px 0; /* Adjust padding */
    }

    .social-icons a {
        color: white; /* Set social icon color */
        font-size: 20px; /* Set social icon size */
        margin-right: 10px; /* Add margin between social icons */
    }
</style>

<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <h5 class="text-white mb-0">&copy;2024 Placement Management System. All rights reserved.</h5>
        <div class="social-icons mt-3">
            <!-- Instagram Icon -->
            <a href="https://www.instagram.com/your_instagram_username" target="_blank" class="text-white mx-2"><i class="fab fa-instagram"></i></a>
            <!-- Facebook Icon -->
            <a href="https://www.facebook.com/your_facebook_page" target="_blank" class="text-white mx-2"><i class="fab fa-facebook"></i></a>
            <!-- YouTube Icon -->
            <a href="https://www.youtube.com/your_youtube_channel" target="_blank" class="text-white mx-2"><i class="fab fa-youtube"></i></a>
            <!-- Another Social Media Icon (e.g., Twitter) -->
            <a href="https://twitter.com/your_twitter_handle" target="_blank" class="text-white mx-2"><i class="fab fa-twitter"></i></a>
        </div>
    </div>
</footer>

