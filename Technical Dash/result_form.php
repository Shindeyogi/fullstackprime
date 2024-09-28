<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $roll_no = $_POST['roll_no'];
    $marks = $_POST['marks'];
    $result = $_POST['result'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO results (student_name, roll_no, marks, result) VALUES ('$student_name', '$roll_no', '$marks', '$result')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Result Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    </style>
</head>
<body>
    <h2 class="mt-5">Result Form</h2>
    <form id="ResultForm" method="post" action="" class="bg-white p-4 rounded shadow-sm" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="StudentName">Student Name:</label>
            <input type="text" id="student_name" name="student_name" class="form-control">
            <div id="StudentNameError" class="text-danger"></div>
        </div>

        <div class="form-group">
            <label for="RollNo">Roll No:</label>
            <input type="number" id="roll_No" name="roll_no" class="form-control">
            <div id="RollNoError" class="text-danger"></div>
        </div>

        <div class="form-group">
            <label for="Marks">Marks (out of 100):</label>
            <input type="number" id="marks" name="marks" min="0" max="100" class="form-control">
            <div id="MarksError" class="text-danger"></div>
        </div>

        <div class="form-group">
            <label for="Result">Result:</label>
            <select id="result" name="result" class="form-control">
                <option value="pass">Pass</option>
                <option value="fail">Fail</option>
            </select>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-3">Submit</button>
    </form>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var student_name = document.getElementById('student_name').value.trim();
            var roll_no = document.getElementById('roll_no').value.trim();
            var marks = document.getElementById('marks').value.trim();

            var studentNameError = document.getElementById('student_nameError');
            var rollNoError = document.getElementById('roll_noError');
            var marksError = document.getElementById('marksError');

            studentNameError.innerText = '';
            rollnoError.innerText = '';
            marksError.innerText = '';

            // Validate Student Name (characters only)
            if (!/^[a-zA-Z\s]+$/.test(studentName)) {
                studentNameError.innerText = 'Please enter a valid student name.';
                return false;
            }

            // Validate Roll No (integer only)
            if (!/^\d+$/.test(rollNo)) {
                rollNoError.innerText = 'Please enter a valid integer roll number.';
                return false;
            }

            // Validate Marks (0-100)
            if (marks === '' || isNaN(marks) || marks < 0 || marks > 100) {
                marksError.innerText = 'Please enter a valid marks between 0 and 100.';
                return false;
            }

            return true; // Form submission allowed if validation passes
        }
    </script>
</body>
</html>
