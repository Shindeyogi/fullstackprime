<?php
include "a_dashb.php" ;
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
        $t_emp_name = $_POST["f_emp_name"];
        $t_emp_email = $_POST["f_emp_email"];
        $t_emp_contact = $_POST["f_emp_contact"];
        $t_emp_address = $_POST["f_emp_address"];
        $t_emp_city	= $_POST["f_emp_city"];
        $t_pincode	=$_POST["f_pincode"];
        $t_company_nm= $_POST["f_comapny_name"];
        $t_emp_current_post=$_POST["f_emp_current_post"];
        $t_password	=   $_POST["f_password"];
        $t_emp_gender =	$_POST["f_gender"];
        $t_emp_dob=	$_POST["f_DateOfBirth"];
        
        	

        // Insert data into MySQL database
        $sql = "INSERT INTO employer_signup(t_emp_name, t_emp_email, t_emp_contact, t_emp_address, t_emp_city, t_pincode, t_company_nm, t_emp_current_post, t_password, t_emp_gender, t_emp_dob) 
        VALUES ('$t_emp_name', '$t_emp_email', '$t_emp_contact', '$t_emp_address', '$t_emp_city', '$t_pincode', '$t_company_nm', '$t_emp_current_post', '$t_password', '$t_emp_gender', '$t_emp_dob')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('sign-up successfully');</script>";

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }


    // Login
    elseif (isset($_POST["login"])) { // Update to check if the "login" button was clicked
        $t_emp_email = $_POST["f_emp_email"];
        $t_password	=   $_POST["f_password"]; // Note: You should hash the password before comparing it with the stored password.

        // Retrieve data from database
        $sql = "SELECT * FROM employer_signup WHERE t_emp_email='$t_emp_email' AND t_password='$t_password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login successful
            echo "<script>alert('Login successfully');</script>";

        } else {
            // Login failed
            echo "Invalid username or password";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Employer Login and Signup Page</title>



</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Login Form -->
                <form id="loginForm" action="job_provider.php" method="post" onsubmit="return validateLoginForm()">
                    <center>
                        <h2>Employer Login</h2>
                    </center>
                    <!-- Form fields -->
                    <div class="form-group">
                        <label for="Email"> Email:</label>
                        <input type="email" class="form-control" id="f_email_login" name="f_email_login"
                            placeholder="Enter your Email" required>
                    </div><br>
                    <!-- Password field -->
                    <div class="form-group">
                        <label for="Password"> Password:</label>
                        <input type="password" class="form-control" id="f_password_login" name="f_password_login"
                            placeholder="Enter Password" required>
                    </div><br>
                    <!-- Login button -->
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                    <!-- Toggle between Signup forms -->
                    <p class="mt-3">Don't have an account? <a href="#" onclick="toggleForms()">Signup here</a>.</p>
                </form>

                <!-- Signup Form -->
                <form id="signupForm" action="job_provider.php" method="post" style="display: none;">
                    <h2>
                        <center>Employer Signup</center>
                    </h2>
                    <br>
                    <div class="form-group">
                        <label for="f_emp_name"> Name:</label>
                        <input type="text" class="form-control" id="f_emp_name" name="f_emp_name"
                            placeholder="Enter your full name" required>
                    </div><br>
                    <div class="form-group">
                        <label for="f_password"> Password:</label>
                        <input type="password" class="form-control" id="f_password" name="f_password"
                            placeholder="Enter Password" required>
                    </div><br>
                    <div class="form-group">
                        <label for="f_emp_email"> Email:</label>
                        <input type="email" class="form-control" id="f_emp_email" name="f_emp_email"
                            placeholder="name@example.com" required>
                    </div><br>
                    <div class="form-group">
                        <label for="f_emp_contact"> Contact:</label>
                        <input type="text" class="form-control" id="f_emp_contact" name="f_emp_contact"
                            placeholder="Enter 10-Digit Mobile Number" required>
                    </div><br>
                    <div class="form-group">
                        <label for="Gender"> Gender:</label>
                        <select class="form-select" id="Gender" name="f_gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="DateOfBirth"> Date of Birth:</label>
                        <input type="date" class="form-control" id="DateOfBirth" name="f_DateOfBirth" required>
                    </div><br>
                    <div class="form-group">
                        <label for="company_name"> Comapany Name:</label>
                        <input type="text" class="form-control" id="text" name="f_comapny_name" required>
                    </div><br>
                    <div class="form-group">
                        <label for="f_emp_current_post"> Current Post:</label>
                        <input type="text" class="form-control" id="f_emp_current_post" name="f_emp_current_post"
                            placeholder="Enter your Current Post in the Comapany" required>
                    </div><br>
                    <div class="form-group">
                        <label for="f_emp_address"> Address:</label>
                        <input type="text" class="form-control" id="f_emp_address" name="f_emp_address"
                            placeholder="Enter your Address" required>
                    </div><br>
                    <div class="form-group ">
                        <label for="f_emp_city">City</label>
                        <select class="form-control" id="f_emp_city" name="f_emp_city" required>
                            <option value="">Select City</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Bangalore">Bangalore</option>
                            <option value="Hyderabad">Hyderabad</option>
                            <option value="Ahmedabad">Ahmedabad</option>
                            <option value="Chennai">Chennai</option>
                            <option value="Kolkata">Kolkata</option>
                            <option value="Bangalore">Bangalore</option>
                            <option value="Surat">Surat</option>
                            <option value="Kochi">Kochi</option>
                            <option value="Banaras">Banaras</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Indore">Indore</option>
                            <option value="Jaipur">Jaipur</option>
                            <option value="Gurgaon">Gurgaon</option>
                            <option value="Mysore">Mysore</option>
                            <option value="Vadodara">Vadodara</option>
                            <option value="Visakhapatnam">Visakhapatnam</option>
                            <option value="Amritsar">Amritsar</option>
                            <option value="Lucknow">Lucknow</option>
                            <option value="Shillong">Shillong</option>
                            <option value="Kanpur">Kanpur</option>
                            <option value="Nagpur">Nagpur</option>
                            <option value="Thane">Thane</option>
                            <option value="Bhopal">Bhopal</option>
                            <option value="pune">Pune</option>
                            <option value="Pimpri & Chinchwad">Pimpri & Chinchwad </option>
                            <option value="Patna">Patna</option>
                            <option value="Agra">Agra</option>
                            <option value="Meerut">Meerut</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="Vasai-virar">Vasai-virar</option>
                            <option value="Nav-mumbai">Nav-mumbai</Nav-mumbai></option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Vijayawada">Vijayawada</option>
                            <option value="Kota">Kota</option>
                            <option value="Solapur">Solapur</option>
                            <option value="Udaipur">Udaipur</option>
                            <option value="Amravati">Amravati</option>
                            <option value="Nashik">Nashik</option>
                            <option value="Nanded">Nanded</option>
                            <option value="Kolhapur">Kolhapur</option>
                            <option value="Ahmednagar">Ahmednagar</option>
                            <option value="Latur">Latur</option>
                            <option value="Akola">Akola</option>
                            <option value="Dhule">Dhule</option>
                            <option value="Chandrapur">Chandrapur</option>
                            <option value="Parbhani">Parbhani</option>
                            <option value="mira-Bhayandar">mira-Bhayandar</mira-Bhayandar></option>
                            <option value="Jalgaon">Jalgaon</option>
                            <option value="Jalna">Jalna</option>
                            <option value="Ambarnath">Ambarnath</option>
                            <option value="Panvel">Panvel</option>
                            <option value="Badlapur">Badlapur</option>
                            <option value="Gondia">Gondia</option>
                            <option value="Satara">Satara</option>
                            <option value="Barshi">Barshi</option>
                            <option value="Yavatmal">Yavatmal</option>
                            <option value="Dharashiv(Osmanabad)">Dharashiv(Osmanabad)</option>
                            <option value="Nandurbar">Nandurbar</option>
                            <option value="Wardhar">Wardhar</option>
                            <option value="Udgir">Udgir</option>
                            <option value="Hinganghat">Hinganghat</option>
                            <option value="Prayagraj">Prayagraj</option>
                            <option value="Chhatrapati Sambhaji-nagar">Chhatrapati Sambhaji-nagar</option>
                            <option value="Srinagar">Srinagar</option>
                            <option value="Other"> </option>
                        </select>
                    </div><br>
                    <div class="form-group">
                        <label for="f_pincode"> Pincode:</label>
                        <input type="text" class="form-control" id="f_pincode" name="f_pincode"
                            placeholder="Enter Pincode" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" name="signup">Signup</button>

                    <!-- Toggle between Login forms -->
                    <p class="mt-3">Already have an account? <a href="#" onclick="toggleForms()">Login here</a></p>
                </form>



            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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