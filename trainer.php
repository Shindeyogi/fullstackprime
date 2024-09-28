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
    // Add Trainer
    if (isset($_POST["Add"])) { // Update to check if the "Add" button was clicked
        // Collect form data
        $t_Tr_name = $_POST["f_name"];
        $t_tr_gender = $_POST["f_stud_gender"];
        $t_tr_Specialization = $_POST["f_special"];
        $t_Tr_contact = $_POST["f_Contact"];
        $t_Tr_email = $_POST["f_Email"];
        $t_tr_Experience = $_POST["f_exp"];

        // Insert data into MySQL database
        $sql = "INSERT INTO trainers (t_Tr_name, t_tr_gender, T_tr_Specialization, t_Tr_contact, t_Tr_email, T_tr_Experience) 
        VALUES ('$t_Tr_name', '$t_tr_gender', '$t_tr_Specialization','$t_Tr_contact','$t_Tr_email','$t_tr_Experience')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Trainer added successfully');window.location.href='trainer.php';</script>";

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
    <title>Trainers Form</title>
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
        #trainersForm {
        margin-top: -120px; /* Adjust this value as needed */
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
                <!-- Trainers Form -->

                <form id="trainersForm" action="trainer.php" method="post">
                    <h2>
                        <center>Trainers Form</center>
                    </h2>
                    <div class="form-group">
                        <label for="Name"> Name:</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" pattern="[A-Za-z\s]+" title="Name must contain only letters and spaces" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Email"> Email:</label>
                        <input type="email" class="form-control" id="f_Email" name="f_Email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="Contact"> Contact:</label>
                        <input type="tel" class="form-control" id="f_Contact" name="f_Contact" pattern="[0-9]{10}" title="Contact must be exactly 10 digits" required>
                    </div>
                    
                    <div class="form-group col-md-4">
                        <label for="f_stud_gender">Gender</label>
                        <select class="form-control" id="f_stud_gender" name="f_stud_gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                
                    <div class="form-group">
                        <label for="specialization"> Specialization:</label>
                        <input type="text" class="form-control" id="f_special" name="f_special" pattern="[A-Za-z\s]+" title="Specialization must contain only letters and spaces" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="f_exp">Experience: </label>
                        <select class="form-control" id="f_exp" name="f_exp" required>
                            <option value="">Select Years</option>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
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
        // JavaScript validation for name and specialization fields
        document.getElementById("f_name").addEventListener("input", function(event) {
            let nameInput = event.target.value;
            if (!/^[A-Za-z\s]+$/.test(nameInput)) {
                event.target.setCustomValidity("Name must contain only letters and spaces");
            } else {
                event.target.setCustomValidity("");
            }
        });

        document.getElementById("f_special").addEventListener("input", function(event) {
            let specializationInput = event.target.value;
            if (!/^[A-Za-z\s]+$/.test(specializationInput)) {
                event.target.setCustomValidity("Specialization must contain only letters and spaces");
            } else {
                event.target.setCustomValidity("");
            }
        });

        // JavaScript validation for contact field
        document.getElementById("f_Contact").addEventListener("input", function(event) {
            let contactInput = event.target.value;
            if (!/^[0-9]{10}$/.test(contactInput)) {
                event.target.setCustomValidity("Contact must be exactly 10 digits");
            } else {
                event.target.setCustomValidity("");
            }
        });
    </script>
</body>

</html>