<?php
//include "a_dashb.php" ;

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
    // Check if the "Add" button was clicked
    if (isset($_POST["Add"])) {
        // Collect form data
        $t_Center_name = $conn->real_escape_string($_POST["f_name"]);
        $t_Location = $conn->real_escape_string($_POST["f_location"]);
        $t_Contact_person_nm = $conn->real_escape_string($_POST["f_cont_person"]);
        $t_Contact_email = $conn->real_escape_string($_POST["f_email"]);
        $t_Contact_number = $conn->real_escape_string($_POST["f_contact"]);
        
        // File upload handling
        if (isset($_FILES["f_center_img"]) && $_FILES["f_center_img"]["error"] === UPLOAD_ERR_OK) {
            $targetDir = "center_upload/";
            $targetFile = $targetDir . basename($_FILES["f_center_img"]["name"]);
            
            // Check file extension
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
            $allowedExtensions = array("jpg", "jpeg", "png", "gif");
            
            if (in_array($imageFileType, $allowedExtensions)) {
                // Move uploaded file to the specified directory
                if (move_uploaded_file($_FILES["f_center_img"]["tmp_name"], $targetFile)) {
                    // Insert data into MySQL database
                    $sql = "INSERT INTO centers (t_Center_name, t_Location, t_Contact_person_nm, t_Contact_email, t_Contact_number, t_Center_img) 
                            VALUES ('$t_Center_name', '$t_Location', '$t_Contact_person_nm', '$t_Contact_email', '$t_Contact_number', '$targetFile')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "Center added successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                } else {
                    echo "Error uploading file";
                }
            } else {
                echo "Invalid file format. Allowed formats: jpg, jpeg, png, gif";
            }
        } else {
            echo "No file uploaded or file upload error occurred.";
        }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Center Form</title>

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

        #CenterForm {
            margin-top: -100px; /* Adjust this value as needed */
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
            .button-container2 {
                left: 20px; /* Adjust left position */
            }
        }
    </style>
</head>

<body>
    <?php include 'a_dashb.php'; ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Center Form -->
                <form id="CenterForm" action="centers.php" method="post" enctype="multipart/form-data" onsubmit="return validateCenterForm()">
                    <h2><center>Center Form</center></h2>
                    <div class="form-group">
                        <label for="Name">Center Name:</label>
                        <input type="text" class="form-control" id="Name" name="f_name" required>
                    </div>
                    <div class="form-group">
                        <label for="location">Location:</label>
                        <input type="text" class="form-control" id="location" name="f_location" required>
                    </div>
                    <div class="form-group">
                        <label for="ContactPerson">Contact Person:</label>
                        <input type="text" class="form-control" id="ContactPerson" name="f_cont_person" required>
                    </div>
                    <div class="form-group">
                        <label for="Contact">Contact:</label>
                        <input type="text" class="form-control" id="Contact" name="f_contact" required>
                    </div>
                    <div class="form-group">
                        <label for="Email">Email:</label>
                        <input type="email" class="form-control" id="Email" name="f_email" required>
                    </div>
                    <div class="mb-3">
                        <label for="center_image" class="form-label">Center Image:</label>
                        <input class="form-control" type="file" id="f_center_img" name="f_center_img" required accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success" name="Add">Add</button>
                </form>
                <div class="button-container2">
                    <a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateCenterForm() {
            var name = document.getElementById("Name").value;
            var location = document.getElementById("location").value;
            var contactPerson = document.getElementById("ContactPerson").value;
            var contact = document.getElementById("Contact").value;

            var nameRegex = /^[A-Z a-z\s]+$/;
            var locationRegex = /^[A-Z a-z\s,]+$/;
            var contactRegex = /^\d{10}$/;

            if (!nameRegex.test(name)) {
                alert("Please enter only characters in the Center Name field.");
                return false;
            }

            if (!locationRegex.test(location)) {
                alert("Please enter only characters and commas in the Location field.");
                return false;
            }

            if (!nameRegex.test(contactPerson)) {
                alert("Please enter only characters in the Contact Person field.");
                return false;
            }

            if (!contactRegex.test(contact)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
