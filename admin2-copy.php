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
    // Sign-up
    if (isset($_POST["signup"])) { // Update to check if the "signup" button was clicked
        // Collect form data
        $t_admin_nm = $_POST["f_name"];
        $t_admin_email = $_POST["f_email"];
        $t_admin_pwd = $_POST["f_password"];
        $t_admin_ph_no = $_POST["f_contact"];

        // Insert data into MySQL database
        $sql = "INSERT INTO admin (t_admin_nm, t_admin_email, t_admin_pwd, t_admin_ph_no) VALUES ('$t_admin_nm', '$t_admin_email', '$t_admin_pwd', '$t_admin_ph_no')";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Sign-up successful');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    // Login
    elseif (isset($_POST["login"])) { // Update to check if the "login" button was clicked
        $t_admin_email = $_POST["f_email"];
        $t_admin_pwd = $_POST["f_password"]; // Note: You should hash the password before comparing it with the stored password.

        // Retrieve data from database
        $sql = "SELECT * FROM admin WHERE t_admin_email='$t_admin_email' AND t_admin_pwd='$t_admin_pwd'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful
            echo "<script>alert('Login successful');window.location.href='admindash2.php';</script>";
        } else {
            // Login failed
            echo "<script>alert('Invalid username or password');</script>";
        }
    }

    
}

// Close database connection
$conn->close();
?>

<!--Html code-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Admin Login and Signup Page</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!--<form action="PHP_forms/admin.php" method="post"></form>-->

                <!-- Login Form -->
                <form id="loginForm" action="admin2.php" method="post" onsubmit="return validateLoginForm()">
                    <center>
                        <h2>Admin Login</h2>
                    </center>
                    <!-- Form fields -->
                    <div class="form-group">
                        <label for="Email"> Email:</label>
                        <input type="email" class="form-control" id="f_email" name="f_email"
                            placeholder="Enter your Email" required>
                    </div><br>
                    <!-- Password field -->
                    <div class="form-group">
                        <label for="Password"> Password:</label>
                        <input type="password" class="form-control" id="f_password" name="f_password"
                            placeholder="Enter Password" required>
                    </div><br>
                    <!-- Login button -->
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <!-- Toggle between Signup forms -->
                    <p class="mt-3">Don't have an account? <a href="#" onclick="toggleForms()">Signup here</a>.</p>
                </form>

                <!-- Signup Form -->

                <form id="signupForm" action="admin2.php" method="post" style="display: none" onsubmit="return validateSignupForm()">

                    <center>
                        <h2>Admin Signup</h2>
                    </center><!-- Form fields -->
                    <div class="form-group">
                        <label for="Name"> Name:</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter your Name"
                            required>
                    </div><br>
                    <!-- Password field -->
                    <div class="form-group">
                        <label for="Password"> Password:</label>
                        <input type="password" class="form-control" id="f_password" name="f_password"
                            placeholder="Enter Password" required>
                    </div><br>
                    <!-- Email field -->
                    <div class="form-group">
                        <label for="Email"> Email:</label>
                        <input type="email" class="form-control" id="f_email" name="f_email"
                            placeholder="Enter your Email" required>
                    </div><br>
                    <!-- Contact field -->
                    <div class="form-group">
                        <label for="Contact"> Contact:</label>
                        <input type="text" class="form-control" id="f_contact" name="f_contact"
                            placeholder="Enter your Contact" required>
                    </div><br>
                    <!-- Signup button -->
                    <button type="submit" class="btn btn-success" name="signup">Signup</button>
                    <!-- Toggle between Login forms -->
                    <p class="mt-3">Already have an account? <a href="#" onclick="toggleForms()">Login here</a>.</p>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
         function validateLoginForm() {
            // Validation logic for login form (if needed)
            // Regular expression to check password complexity
           
            var email = document.getElementById("f_email_signup").value;
            
           

            return true; // Return true if validation passes, false otherwise
        }

        function validateSignupForm() {
            
            // Retrieve form fields
            var name = document.getElementById("f_name").value;
            
            var email = document.getElementById("f_email").value;
            var contact = document.getElementById("f_contact").value;

            // Check if name contains only characters
            if (!/^[A-Za-z\s]+$/.test(name)) {
                alert("Please enter only characters in the Name field.");
                return false;
            }

            

            // Check if contact contains exactly 10 digits
            if (!/^\d{10}$/.test(contact)) {
                alert("Please enter a valid 10-digit contact number.");
                return false;
            }

            return true; // Return true if all validations pass
        }


        function login() {
            alert("Login logic goes here!");
        }

        function signup() {
            alert("Signup logic goes here!");
        }

        function toggleForms() {
            const loginForm = document.getElementById("loginForm");
            const signupForm = document.getElementById("signupForm");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                signupForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                signupForm.style.display = "block";
            }
        }
    </script>
</body>

</html>


