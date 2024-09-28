<?php
// Database connection parameters
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
    // Check if all form fields are set
    if (isset($_POST["f_name"]) && isset($_POST["f_email"]) && isset($_POST["f_contact"]) && isset($_POST["f_topic"]) && isset($_POST["state"]) && isset($_POST["course_name"])) {
        // Collect form data
        $t_stud_nm = $_POST["f_name"];
        $t_stud_email = $_POST["f_email"];
        $t_stud_contact = $_POST["f_contact"];
        $t_state = $_POST["state"];
        $t_topic = $_POST["f_topic"];
        $course_name = $_POST["course_name"];

        // Prepare and bind parameters to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO courses_enq (t_stud_nm, t_stud_email, t_stud_contact, t_state, t_topic) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiss", $t_stud_nm, $t_stud_email, $t_stud_contact, $t_state, $t_topic);

        // Execute the statement
        if ($stmt->execute()) {
            // Define file path
            $filePath = "C:/xampp/htdocs/TNP_PRO/enqpdf/Prime Infotech Solution.pdf";

            // Check if file exists
            if (file_exists($filePath)) {
                // Set headers for file download
                header('Content-Type: application/pdf');
                header('Content-Disposition: inline; filename="' . basename($filePath) . '"');
                header('Content-Length: ' . filesize($filePath));

                // Output the file content
                readfile($filePath);
                exit(); // Stop script execution after file output
            } else {
                echo "Syllabus file not found!";
            }
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close(); // Close statement
    }
}
// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiry</title>
    <link rel="icon" href="" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .container{
            padding: 50px;
            margin-top: 90px !important;
            box-shadow: 50px;
            border-radius: 20px;
        }
        .header{
            font-size: 35px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container mt-5" style="border:2px solid black">
        <h3 style="text-align:center;"><span class="latter">I</span>nquiry <span class="latter">F</span>orm</h3>
        <form id="inquiryForm" method="post" class="mt-5" action="">
            <div class="mb-3">
                <label for="f_name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="f_name" name="f_name" required>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="f_email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="f_email" name="f_email" required>
                </div>
                <div class="col-md-6">
                    <label for="f_contact" class="form-label">Contact:</label>
                    <input type="tel" class="form-control" id="f_contact" name="f_contact" placeholder="Phone Number" pattern="[0-9]{10}" title="Please enter 10-digit phone number" required>
                </div>
                <div class="mb-3 row">
                    <label for="state" class="col-sm-4 col-form-label">State:</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="state" name="state" onchange="loadDistricts()" required>
                            <option value="">Select State</option>
                            <option value="AndraPradesh">Andhra Pradesh</option>
                            <option value="ArunachalPradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="HimachalPradesh">Himachal Pradesh</option>
                            <option value="JammuKashmir">Jammu Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Kerala">Kerala</option>
                            <option value="MadhyaPradesh">Madhya Pradesh</option>
                            <option value="Sehore">Sehore</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="TamilNadu">Tamil Nadu</option>
                            <option value="Tripura">Tripura</option>
                            <option value="UttarPradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="WestBengal">West Bengal</option>
                            <option value="AndamanNicobar">Andaman Nicobar</option>
                            <option value="DamanDiu">Daman Diu</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Puducherry">Puducherry</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="f_topic" class="col-sm-4 col-form-label">Topic:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="f_topic" name="f_topic">
                </div>
            </div>
            <!-- Hidden input field to store subcoursename -->
            <input type="hidden" name="course_name" value="<?php echo isset($_GET['course_name']) ? $_GET['course_name'] : ''; ?>">
            <button type="submit" class="btn btn-primary d-block mx-auto mb-3 mt-4" style="width: 300px;" name="sub">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS (Place this before the closing </body> tag) -->
    <script src="js/dist.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
