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

// Define upload directories for images and PDFs
$imageUploadDir = 'courses_upload/images/';
$pdfUploadDir = 'courses_upload/pdfs/';

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $course_name = $_POST["NameOfCourses"];
    $instructor = $_POST["TrainerName"];
    $location = $_POST["Location"];
    $start_date = $_POST["StartingDate"];
    $duration = $_POST["Duration"];
    $syllabus = ""; // Placeholder for syllabus file path
    $image1 = ""; // Placeholder for image1 file path
    $image2 = ""; // Placeholder for image2 file path

    // Handle file uploads for image1 and image2
    $image1FileName = $_FILES['Image1']['name'];
    $image2FileName = $_FILES['Image2']['name'];

    // Move uploaded images to the image upload directory
    if (move_uploaded_file($_FILES['Image1']['tmp_name'], $imageUploadDir . $image1FileName)) {
        $image1 = $imageUploadDir . $image1FileName;
    }
    if (move_uploaded_file($_FILES['Image2']['tmp_name'], $imageUploadDir . $image2FileName)) {
        $image2 = $imageUploadDir . $image2FileName;
    }

    // Handle file upload for syllabus
    $syllabusFileName = $_FILES['Syllabus']['name'];
    $syllabusFileTmp = $_FILES['Syllabus']['tmp_name'];
    $syllabusFileType = strtolower(pathinfo($syllabusFileName, PATHINFO_EXTENSION));

    // Check if the uploaded file is a PDF
    if ($syllabusFileType != 'pdf') {
        echo "Only PDF files are allowed.";
        exit();
    }

    // Move uploaded PDF file to the PDF upload directory
    if (move_uploaded_file($syllabusFileTmp, $pdfUploadDir . $syllabusFileName)) {
        $syllabus = $pdfUploadDir . $syllabusFileName;
    } else {
        echo "Error uploading syllabus file.";
        exit();
    }

    // Insert data into MySQL database
    $sql = "INSERT INTO courses (course_name, instructor, location, start_date, duration, syllabus, image1, image2) 
    VALUES ('$course_name', '$instructor', '$location', '$start_date', '$duration', '$syllabus', '$image1', '$image2')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('All entries disabled. Changes saved successfully');window.location.href='courses_form.php';</script>";
        // header("Location: .php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Course Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Datepicker CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f2f2f2;
        }
        form {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .profile-photo {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2 class="mt-5">Course Form</h2>
    <form id="Courseform" method="post" action="courses_form" class="bg-white p-4 rounded shadow-sm" onsubmit="return validateForm()" enctype="multipart/form-data">
        <div class="form-group">
            <label for="NameOfCourses">Name of Courses:</label>
            <input type="text" id="NameOfCourses" name="NameOfCourses" class="form-control">
            <div id="nameofcoursesError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="TrainerName">Trainer Name:</label>
            <input type="text" id="TrainerName" name="TrainerName" class="form-control">
            <div id="TrainernameError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Location">Location:</label>
            <input type="text" id="Location" name="Location" class="form-control">
            <div id="LocationError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="StartingDate">Starting Date:</label>
            <input type="text" id="StartingDate" name="StartingDate" class="form-control datepicker" readonly>
            <div id="StartDateError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Syllabus">Syllabus (Upload File):</label>
            <input type="file" id="Syllabus" name="Syllabus" accept="application/pdf" class="form-control-file">

            <div id="SyllabusError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Image1">Image 1 (Upload File):</label>
            <input type="file" id="Image1" name="Image1" accept="image/*" class="form-control-file">
            <div id="Image1Error" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Image2">Image 2 (Upload File):</label>
            <input type="file" id="Image2" name="Image2" accept="image/*" class="form-control-file">
            <div id="Image2Error" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Duration">Duration (in hours):</label>
            <input type="text" id="Duration" name="Duration" class="form-control">
            <div id="DurationError" class="text-danger"></div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-3">Submit</button>
    </form>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap Datepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){
            // Initialize datepicker
            $('.datepicker').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true
            });
        });

        // Form validation
        function validateForm() {
            var courseName = document.getElementById("NameOfCourses").value;
            var trainerName = document.getElementById("TrainerName").value;
            var location = document.getElementById("Location").value;
            var startDate = document.getElementById("StartingDate").value;
            var syllabus = document.getElementById("Syllabus").value;
            var image1 = document.getElementById("Image1").value;
            var image2 = document.getElementById("Image2").value;
            var duration = document.getElementById("Duration").value;

            var nameRegex = /^[a-zA-Z\s]+$/;
            var locationRegex = /^[a-zA-Z]+$/; // Allow only alphabetic characters 
            var dateRegex = /^\d{4}-\d{2}-\d{2}$/;
            var durationRegex = /^\d+$/; // Allow only integers

            // Reset error messages
            document.getElementById("nameofcoursesError").innerHTML = "";
            document.getElementById("TrainernameError").innerHTML = "";
            document.getElementById("LocationError").innerHTML = "";
            document.getElementById("StartDateError").innerHTML = "";
            document.getElementById("SyllabusError").innerHTML = "";
            document.getElementById("Image1Error").innerHTML = "";
            document.getElementById("Image2Error").innerHTML = "";
            document.getElementById("DurationError").innerHTML = "";

            if (!courseName.match(nameRegex)) {
                document.getElementById("nameofcoursesError").innerHTML = "Please enter a valid course name.";
                return false;
            }

            if (!trainerName.match(nameRegex)) {
                document.getElementById("TrainernameError").innerHTML = "Please enter a valid trainer name.";
                return false;
            }

            if (!location.match(locationRegex)) {
                document.getElementById("LocationError").innerHTML = "Please enter a valid location with alphabetic characters only.";
                return false;
            }

            if (startDate.trim() === "" || !startDate.match(dateRegex)) {
                document.getElementById("StartDateError").innerHTML = "Please enter a valid start date (yyyy-mm-dd format).";
                return false;
            }

            if (!duration.match(durationRegex)) {
                document.getElementById("DurationError").innerHTML = "Please enter a valid duration (integer only).";
                return false;
            }

            // Add validation for syllabus, images, and other fields here...

            return true;
        }
    </script>
</body>
</html>
