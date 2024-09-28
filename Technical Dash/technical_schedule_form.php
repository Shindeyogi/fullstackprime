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
    $teamMember = $_POST['TeamMember'];
    $taskName = $_POST['TaskName'];
    $date = $_POST['Date'];
    $time = $_POST['Time'];

    // SQL query to insert data into the database
    $sql = "INSERT INTO schedules (team_member, task_name, date, time) VALUES ('$teamMember', '$taskName', '$date', '$time')";

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
    <title>Add Schedule</title>
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
    <h2 class="mt-5">Add Schedule</h2>
    <form id="AddSchedule" method="post" action="" class="bg-white p-4 rounded shadow-sm" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="TeamMember">Team Member:</label>
            <input type="text" id="TeamMember" name="TeamMember" class="form-control">
            <div id="teamMemberError" class="text-danger"></div>
        </div>

        <div class="form-group">
            <label for="Taskname">Task Name:</label>
            <input type="text" id="TaskName" name="TaskName" class="form-control">
            <div id="nameError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Date">Date:</label>
            <input type="date" id="Date" name="Date" class="form-control">
            <div id="dateError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Time">Time (HH:MM):</label>
            <input type="text" id="Time" name="Time" class="form-control">
            <div id="timeError" class="text-danger"></div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block mt-3">Submit</button>
    </form>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var taskName = document.getElementById('Taskname').value.trim();
            var teamMember = document.getElementById('TeamMember').value.trim();
            var date = document.getElementById('Date').value.trim();
            var time = document.getElementById('Time').value.trim();

            var nameError = document.getElementById('nameError');
            var teamMemberError = document.getElementById('teamMemberError');
            var dateError = document.getElementById('dateError');
            var timeError = document.getElementById('timeError');

            nameError.innerText = '';
            teamMemberError.innerText = '';
            dateError.innerText = '';
            timeError.innerText = '';

            // Validate Task Name (characters only)
            if (!/^[a-zA-Z\s]+$/.test(taskName)) {
                nameError.innerText = 'Please enter a valid task name.';
                return false;
            }

            // Validate Team Member Name (characters only)
            if (!/^[a-zA-Z\s]+$/.test(teamMember)) {
                teamMemberError.innerText = 'Please enter a valid team member name.';
                return false;
            }

            // Validate Date (calendar format)
            if (!/^\d{4}-\d{2}-\d{2}$/.test(date)) {
                dateError.innerText = 'Please enter a valid date in YYYY-MM-DD format.';
                return false;
            }

            // Validate Time (HH:MM format)
            if (!/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/.test(time)) {
                timeError.innerText = 'Please enter a valid time in HH:MM format.';
                return false;
            }

            return true; // Form submission allowed if validation passes
        }
    </script>
</body>
</html>
