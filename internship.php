<?php
// Database connection parameters
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

// If the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process file upload
    if (isset($_FILES["image"])) {
        $targetDir = "intern_upload/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if file is an image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (5MB limit)
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow only specific file formats
        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Process file upload if no errors
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                // File uploaded successfully, now insert data into database
                $internship = $_POST["internship"];
                $position = $_POST["position"];
                $description = $_POST["description"];
                $location = $_POST["location"];
                $duration = $_POST["duration"];
                $requirements = $_POST["requirements"];

                // Prepare SQL statement with placeholders
                $stmt = $conn->prepare("INSERT INTO internships (internship, position, about_us, location, duration, image, requirements) VALUES (?, ?, ?, ?, ?, ?, ?)");
                
                // Check if the prepare() succeeded
                if ($stmt === false) {
                    die("Prepare failed: " . $conn->error);
                }

                // Bind parameters to the SQL statement
                $stmt->bind_param("sssssss", $internship, $position, $description, $location, $duration, $targetFile, $requirements);

                // Execute the statement
                if ($stmt->execute()) {
                    echo "<script>alert('Internship added successfully');</script>";

                } else {
                    echo "Error: " . $stmt->error;
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Internship Form</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> <!-- Font Awesome CSS -->

  <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #006aff;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        #internForm {
        margin-top: -50px;  Adjust this value as needed 
    }
    .button-container2 {
            position: fixed;
            bottom: 20px;
            left: 21%;
            transform: translateX(-50%);
            z-index: 999; /* Ensure it's above other content */
        }

        .button-container2 a {
            display: inline-block;
            padding: 10px;
            background-color: #008B8B;
            color: white;
            border-radius: 10%;
            text-decoration: none;
        }

        /* Media queries */
        @media screen and (max-width: 992px) {
            /* Adjust form layout for smaller screens */
            /* form {
                padding: 20px;  Add padding 
            } */
            .button-container2 {
                left: 20px; /* Adjust left position */
            }
        }
    </style>

</head>
<body>
<?php
    include 'a_dashb.php'
    // Your PHP code here
    ?>
  <div class="container">
    <!-- <h2>Add Internship</h2> -->
    <form id="internForm" action="internship.php" method="POST" enctype="multipart/form-data">
      <label for="internship">Internship:</label>
      <input type="text" id="internship" name="internship" required>

      <label for="position">Position:</label>
      <input type="text" id="position" name="position" required>

      <label for="description">About Us:</label>
      <textarea id="description" name="description" rows="4" cols="50" required></textarea>

      <label for="location">Location:</label>
      <input type="text" id="location" name="location" required>

      <label for="duration">Duration:</label>
      <select id="duration" name="duration" required>
      <option value="">Select Duration</option>
        <option value="2 months">2 months</option>
        <option value="3 months">3 months</option>
        <option value="4 months">4 months</option>
        <option value="5 months">5 months</option>
        <option value="6 months">6 months</option>
      </select>
<br>
      <label for="start_date" class="date-icon">Start Date:</label>
      <div class="date-icon">
        <input type="date" id="start_date" name="start_date" required>
      </div>
<br>
      <label for="image">Image:</label>
      <input type="file" id="image" name="image" accept="image/*" required><br>

      <label for="requirements">Requirements:</label>
      <textarea id="requirements" name="requirements" rows="4" cols="50" required></textarea>

      <input type="submit" value="Submit">
    </form>
    <div class="button-container2">
        <a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
    </div>
  </div>
</body>
</html>


