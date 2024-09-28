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

// Fetch images from the database
$sql = "SELECT t_slider_img FROM sliderimage where status='1' ";
$result = $conn->query($sql);

$images = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $images[] = $row;
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .carousel.scrolled {
    margin-top: 0px; /* No margin-top when navbar is scrolled */
}

/* Custom CSS to make all carousel images full size */
.carousel-item img {
    width: 100%; /* Set width to fill the entire container */
    height: 50vh; /* Set height to fill the entire viewport */
    object-fit: cover; /* Maintain aspect ratio while covering the entire space */
}
</style>
<body>

<div id="demo" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <?php
    $active = "active";
    foreach ($images as $image) {
        echo '<div class="carousel-item ' . $active . '">';
        echo '<img src="' . htmlspecialchars($image["t_slider_img"]) . '" class="d-block w-100" alt="Event Image">';
        echo '</div>';
        $active = ""; // Only set active for the first item
    }
    ?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

<!-- Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('.carousel').carousel();
    });
</script>

</body>
</html>
