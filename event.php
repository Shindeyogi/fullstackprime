<?php
//include "a_dashb.php"; // Include the PHP file

$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "tnp_k"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (isset($_POST["event_name"])) {
        
        $event_name = $_POST["event_name"];
        $event_contact = $_POST["event_contact_number"];
        $event_location = $_POST["location"];
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $event_time = $_POST["event_time"];

        
        $target_dir = "event_upload/"; 
        $target_file = $target_dir . basename($_FILES["event_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["event_image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        
        if ($_FILES["event_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        
        } else {
            if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["event_image"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        
        $sql = "INSERT INTO events (event_name, event_contact, event_location, start_date, end_date, event_time, event_image) VALUES ('$event_name', '$event_contact', '$event_location', '$start_date', '$end_date', '$event_time', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            echo "";
            echo "<script>alert('Event added successfully');window.location.href='event.php';</script>";

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
    // Close database connection
$conn->close();
?>


<!-- html file  -->   
     

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }

        form {
           
            max-width: 500px;
            margin: 0 auto;
            margin-top:-60px;
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
    ?>
    <div>
        <!-- <h2> event </h2> -->
    </div>
    <form action="event.php" method="post" enctype="multipart/form-data" class="p-3">
        <label for="event_name">Name of the Event :</label>
        <input type="text" id="event_name" name="event_name" class="form-control">
        <label for="image">Select Image:</label>
        <input type="file" id="event_image" name="event_image" accept="image/*">
        <label for="event_contact_number">Contact Number :</label>
        <input type="text" class="form-control" id="event_contact_number" name="event_contact_number" placeholder="Enter your Contact" required>
        <label for="location">Location:</label>
        <input type="text" id="location" name="location" class="form-control">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date" class="form-control">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date" class="form-control">
        <label for="event_time">Time :</label>
        <input type="time" id="event_time" name="event_time" class="form-control">
        <input type="submit" value="submit" class="btn btn-success mt-3">
    </form>
    <div class="button-container2">
        <a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            var eventName = document.getElementById("event_name").value;
            var location = document.getElementById("location").value;
            var contactNumber = document.getElementById("event_contact_number").value;

            // Regular expression to allow only characters
            var nameRegex = /^[A-Za-z\s]+$/;

            // Regular expression to allow only 10 digits for contact number
            var contactRegex = /^\d{10}$/;

            // Check if eventName contains only characters
            if (!nameRegex.test(eventName)) {
                alert("Please enter only characters in the Name of the event field.");
                return false;
            }

            // Check if location contains only characters
            if (!nameRegex.test(location)) {
                alert("Please enter only characters in the Location field.");
                return false;
            }

            // Check if contactNumber contains exactly 10 digits
            if (!contactRegex.test(contactNumber)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }

            return true; // Form submission allowed if all validations pass
        }
    </script>

</body>

</html>







