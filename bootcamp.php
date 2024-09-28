<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp_k";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if the form data is set
    if (isset($_POST["event_name"], $_POST["event_contact"], $_POST["location"], $_POST["start_date"], $_POST["end_date"], $_POST["event_time"], $_FILES["event_image"])) {
        
        $event_name = $_POST["event_name"];
        $event_contact = $_POST["event_contact"];
        $event_location = $_POST["location"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $event_time = $_POST["event_time"];

        $target_dir = "event_uploads/";
        $target_file = $target_dir . basename($_FILES["event_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is an actual image
        $check = getimagesize($_FILES["event_image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["event_image"]["size"] > 5000000) { // 5MB limit
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            // if everything is ok, try to upload file
            if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["event_image"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        // Insert into database using a prepared statement to avoid SQL injection
        $sql = "INSERT INTO events (event_name, event_contact, event_location, start_date, end_date, event_time, event_image) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("sssssss", $event_name, $event_contact, $event_location, $start_date, $end_date, $event_time, $target_file);
            if ($stmt->execute()) {
                echo "Event added successfully";
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
}

$conn->close();
?>
