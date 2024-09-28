<?php
session_start();

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
    if (isset($_POST["signup"])) {
        // Sign-up form data
        $t_stud_nm = $_POST["f_stud_nm"] ?? "";
        $t_stud_email = $_POST["f_stud_email"] ?? "";
        $t_stud_contact = $_POST["f_stud_contact"] ?? "";
        $t_stud_DOB = $_POST["f_stud_DOB"] ?? "";
        $t_stud_gender = $_POST["f_stud_gender"] ?? "";
        $t_stud_address = $_POST["f_stud_address"] ?? "";
        $t_pincode = $_POST["zip"] ?? "";
        $t_country = $_POST["country"] ?? "";
        $t_stud_state = $_POST["state"] ?? "";
        $t_stud_district = $_POST["district"] ?? "";
        $t_subdistrict = $_POST["subdistrict"] ?? "";
        $t_village = $_POST["Village"] ?? "";
        $t_clg_name = $_POST["f_clg_name"] ?? "";
        $t_qualification = $_POST["f_qualification"] ?? "";
        $t_passout_year = $_POST["f_passout_year"] ?? "";
        $t_cgpa = $_POST["f_cgpa"] ?? "";
        $t_university_nm = $_POST["f_university_nm"] ?? "";
        $t_password = $_POST["f_password"] ?? "";
        $documentNames = [];

        // Handle profile photo upload
        if (isset($_FILES["f_stud_profile"]) && $_FILES["f_stud_profile"]["error"] === UPLOAD_ERR_OK) {
            $profilePhotoName = $_FILES["f_stud_profile"]["name"];
            $profilePhotoTmp = $_FILES["f_stud_profile"]["tmp_name"];
            $profilePhotoType = strtolower(pathinfo($profilePhotoName, PATHINFO_EXTENSION));
            $profileUploadDirectory = "stud_upload/profile_photo/";
            $profilePhotoNewName = uniqid() . '.' . $profilePhotoType;
            $profileUploadPath = $profileUploadDirectory . $profilePhotoNewName;

            if (move_uploaded_file($profilePhotoTmp, $profileUploadPath)) {
                // Profile photo upload successful
            } else {
                echo "Failed to move uploaded profile photo.";
                exit;
            }
        } else {
            echo "Invalid file type for profile photo. Please upload JPG or PNG images.";
            exit;
        }

        // Handle document upload
        if (isset($_FILES["f_upload_docs"]) && !empty($_FILES["f_upload_docs"]["name"][0])) {
            $uploadDirectory = "stud_upload/documents/";

            // Loop through each uploaded file
            for ($i = 0; $i < count($_FILES["f_upload_docs"]["name"]); $i++) {
                $documentName = $_FILES["f_upload_docs"]["name"][$i];
                $documentTmp = $_FILES["f_upload_docs"]["tmp_name"][$i];
                $documentType = strtolower(pathinfo($documentName, PATHINFO_EXTENSION));
                $documentNewName = uniqid() . '.' . $documentType;
                $documentUploadPath = $uploadDirectory . $documentNewName;

                if (move_uploaded_file($documentTmp, $documentUploadPath)) {
                    // File uploaded successfully
                } else {
                    echo "Failed to upload file: $documentName <br>";
                }
            }
        } else {
            echo "No documents uploaded.";
        }

        // Insert data into database
        $sql = "INSERT INTO registration (t_stud_nm, t_stud_email, t_stud_contact, t_stud_DOB, t_stud_gender, t_stud_address, t_pincode, t_country, t_stud_state, t_stud_district, t_subdistrict, t_village, t_clg_name, t_qualification, t_passout_year, t_cgpa, t_university_nm, t_stud_profile, t_password) 
                VALUES ('$t_stud_nm', '$t_stud_email', '$t_stud_contact', '$t_stud_DOB', '$t_stud_gender', '$t_stud_address', '$t_pincode', '$t_country', '$t_stud_state', '$t_stud_district', '$t_subdistrict', '$t_village', '$t_clg_name', '$t_qualification', '$t_passout_year', '$t_cgpa', '$t_university_nm', '$profileUploadPath', '$t_password')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Sign-up Successfully');</script>";

        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST["login"])) {
        // Login form data
        $email = $_POST["email"] ?? "";
        $password = $_POST["password"] ?? "";

        $sql = "SELECT * FROM registration WHERE t_stud_email = '$email' AND t_password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION['user_email'] = $email;
            echo "<script>alert('Login successful'); window.location.href='studentdash5.php';</script>";
        } else {
            echo "Invalid email or password";
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
    <title>Student Registration Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-heading {
            background-color: #99b9fe;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .toggle-link {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
        }

        .toggle-link:hover {
            text-decoration: none;
        }

        .form-section {
            margin: 0 auto;
            width: 50%;
            margin-bottom: 30px;
        }

        .container {
            margin-right: 80px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Student Registration Form</h2>

        <!--Login form-->
        <div id="login-form">
            <form id="Login" action="student23.php" method="post">
                <input type="hidden" name="login" value="1">
                <div class="form-section">
                    <div class="form-heading short-input">
                        Login
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="course_name" value="<?php echo isset($_GET['course_name']) ? htmlspecialchars($_GET['course_name']) : ''; ?>">

                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control short-input" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control short-input" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="text-center mt-3">
                    <span class="toggle-link" onclick="toggleForms()">Don't have an account? Sign up</span>
                </div>
            </form>
        </div>

        <div id="signup-form" style="display: none;">
            <form id="Registration" action="student23.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="signup" value="1">
                <!-- Personal Information Section -->
                <div class="form-section">
                    <div class="form-heading">
                        Personal Information
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="f_stud_nm" class="form-label">Student Name:</label>
                            <input type="text" class="form-control" id="f_stud_nm" name="f_stud_nm" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_stud_email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="f_stud_email" name="f_stud_email" placeholder="Enter your email" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_stud_contact" class="form-label">Contact Number:</label>
                            <input type="tel" class="form-control" id="f_stud_contact" name="f_stud_contact" placeholder="Enter your contact number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_stud_DOB" class="form-label">Date of Birth:</label>
                            <input type="date" class="form-control" id="f_stud_DOB" name="f_stud_DOB" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_stud_gender" class="form-label">Gender:</label>
                            <select class="form-control" id="f_stud_gender" name="f_stud_gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_stud_profile" class="form-label">Upload Profile Photo:</label>
                            <input type="file" class="form-control-file" id="f_stud_profile" name="f_stud_profile" accept=".jpg, .jpeg, .png" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="f_stud_address" class="form-label">Address:</label>
                            <textarea class="form-control" id="f_stud_address" name="f_stud_address" placeholder="Enter your address" rows="2" required></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="zip" class="form-label">Pin code:</label>
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Enter your pin code" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="country" class="form-label">Country:</label>
                            <input type="text" class="form-control" id="country" name="country" placeholder="Enter your country" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="state" class="form-label">State:</label>
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter your state" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="district" class="form-label">District:</label>
                            <input type="text" class="form-control" id="district" name="district" placeholder="Enter your district" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="subdistrict" class="form-label">Sub-District:</label>
                            <input type="text" class="form-control" id="subdistrict" name="subdistrict" placeholder="Enter your sub-district" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="Village" class="form-label">Village:</label>
                            <input type="text" class="form-control" id="Village" name="Village" placeholder="Enter your village" required>
                        </div>
                    </div>
                </div>

                <!-- Educational Information Section -->
                <div class="form-section">
                    <div class="form-heading">
                        Educational Information
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="f_clg_name" class="form-label">College Name:</label>
                            <input type="text" class="form-control" id="f_clg_name" name="f_clg_name" placeholder="Enter your college name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_qualification" class="form-label">Qualification:</label>
                            <input type="text" class="form-control" id="f_qualification" name="f_qualification" placeholder="Enter your qualification" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_passout_year" class="form-label">Passout Year:</label>
                            <input type="number" class="form-control" id="f_passout_year" name="f_passout_year" placeholder="Enter your passout year" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="f_cgpa" class="form-label">CGPA:</label>
                            <input type="text" class="form-control" id="f_cgpa" name="f_cgpa" placeholder="Enter your CGPA" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="f_university_nm" class="form-label">University Name:</label>
                            <input type="text" class="form-control" id="f_university_nm" name="f_university_nm" placeholder="Enter your university name" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="f_upload_docs" class="form-label">Upload Documents:</label>
                            <input type="file" class="form-control-file" id="f_upload_docs" name="f_upload_docs[]" multiple>
                        </div>
                    </div>
                </div>

                <!-- Account Information Section -->
                <div class="form-section">
                    <div class="form-heading">
                        Account Information
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="f_password" class="form-label">Password:</label>
                            <input type="password" class="form-control" id="f_password" name="f_password" placeholder="Enter your password" required>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="text-center mt-3">
                    <span class="toggle-link" onclick="toggleForms()">Already have an account? Login</span>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Custom Script to Toggle Forms -->
    <script>
        function toggleForms() {
            var loginForm = document.getElementById("login-form");
            var signupForm = document.getElementById("signup-form");
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
