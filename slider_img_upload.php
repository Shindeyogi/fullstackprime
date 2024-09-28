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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all required form fields are set
    if (isset($_FILES["t_slider_img"]["name"], $_POST["t_sliderimg_desc"])) {

        $t_sliderimg_desc = $_POST["t_sliderimg_desc"];

        $targetDir = "sliderimage_upload/"; // Directory where uploaded files will be saved
        $targetFile = $targetDir . basename($_FILES["t_slider_img"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES["t_slider_img"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($targetFile)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["t_slider_img"]["size"] > 5000000) { // 5MB limit
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
            if (move_uploaded_file($_FILES["t_slider_img"]["tmp_name"], $targetFile)) {
                // Insert into database using a prepared statement to avoid SQL injection
                $sql = "INSERT INTO sliderimage (t_slider_img, t_sliderimg_desc) VALUES (?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("ss", $targetFile, $t_sliderimg_desc);
                    if ($stmt->execute()) {
                
                        echo "<script>alert('Image uploaded and inserted successfully');</script>";

                    } else {
                        echo "Error: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error preparing statement: " . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    } else {
        echo "Please fill all required fields.";
    }
}

// Close database connection
$conn->close();
?>