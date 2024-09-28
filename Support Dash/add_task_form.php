<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "tnp"; // Replace with your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $t_tech_task_nm = $_POST['Taskname'];
    $t_tech_task_team = $_POST['TeamMember'];
    $t_tech_task_deadline = $_POST['Deadline'];

    // SQL query to insert data into the database table
    $sql = "INSERT INTO  tech_task (t_tech_task_nm, t_tech_task_team, t_tech_task_deadline) VALUES ('$t_tech_task_nm', '$t_tech_task_team', '$t_tech_task_deadline')";

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
    <title>Add Task</title>
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
    <h2 class="mt-5">Add Task</h2>
    <form id="AddTaskForm" method="post" action="" class="bg-white p-4 rounded shadow-sm" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="Taskname">Task Name:</label>
            <input type="text" id="Taskname" name="Taskname" class="form-control" >
            <div id="nameError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="TeamMember">Team Member:</label>
            <input type="text" id="TeamMember" name="TeamMember" class="form-control" >
            <div id="teamMemberError" class="text-danger"></div>
        </div>
        <div class="form-group">
            <label for="Deadline">Deadline:</label>
            <input type="text" id="Deadline" name="Deadline" class="form-control" >
            <div id="deadlineError" class="text-danger"></div>
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
            var deadline = document.getElementById('Deadline').value.trim();

            var nameError = document.getElementById('nameError');
            var teamMemberError = document.getElementById('teamMemberError');
            var deadlineError = document.getElementById('deadlineError');

            nameError.innerText = '';
            teamMemberError.innerText = '';
            deadlineError.innerText = '';

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

            // Validate Deadline (integer)
            if (!/^\d+$/.test(deadline)) {
                deadlineError.innerText = 'Please enter a valid deadline.';
                return false;
            }

            return true; // Form submission allowed if validation passes
        }
    </script>
</body>
</html>
