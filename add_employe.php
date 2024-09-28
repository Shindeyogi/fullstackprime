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
        $employee_name = $conn->real_escape_string($_POST["employee_name"]);
        $employee_email = $conn->real_escape_string($_POST["employee_email"]);
        $password = $conn->real_escape_string($_POST["password"]);
        $employee_contact = $conn->real_escape_string($_POST["employee_contact"]);
        $department = $conn->real_escape_string($_POST["department"]);
        
        // Insert data into MySQL database
        $sql = "INSERT INTO add_employee (employee_name, employee_email, password, employee_contact, department) 
                VALUES ('$employee_name', '$employee_email', '$password', '$employee_contact', '$department')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Employee added successfully');window.location.href='add_employe.php';</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Employee Form</title>

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
        #EmployeeForm {
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
    include 'a_dashb.php';
    ?>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Employee Form -->
                <form id="EmployeeForm" action="add_employe.php" method="post" onsubmit="return validateEmployeeForm()">
                    <h2><center>Employee Form</center></h2>
                    <div class="form-group">
                        <label for="EmployeeName">Employee Name:</label>
                        <input type="text" class="form-control" id="EmployeeName" name="employee_name" required>
                    </div>
                    <div class="form-group">
                        <label for="EmployeeEmail">Employee Email:</label>
                        <input type="email" class="form-control" id="EmployeeEmail" name="employee_email" required>
                    </div>
                    <div class="form-group">
                        <label for="Password">Password:</label>
                        <input type="password" class="form-control" id="Password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="EmployeeContact">Employee Contact:</label>
                        <input type="tel" class="form-control" id="EmployeeContact" name="employee_contact" required>
                    </div>
                    <div class="form-group">
                        <label for="Department">Department:</label>
                        <select class="form-control" id="Department" name="department" required>
                            <option value="">Select Department</option>
                            <option value="Management">Management Team</option>
                            <option value="Technical">Technical Team</option>
                            <option value="Support">Support Team</option>
                        
                        </select>
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
        function validateEmployeeForm() {
            var name = document.getElementById("EmployeeName").value;
            var email = document.getElementById("EmployeeEmail").value;
            var password = document.getElementById("Password").value;
            var contact = document.getElementById("EmployeeContact").value;
            var department = document.getElementById("Department").value;

            var nameRegex = /^[A-Za-z\s]+$/;
            var contactRegex = /^\d{10}$/;

            if (!nameRegex.test(name)) {
                alert("Please enter only characters in the Employee Name field.");
                return false;
            }

            if (!contactRegex.test(contact)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }

            if (department === "") {
                alert("Please select a department.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>
