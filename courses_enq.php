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
    // Check if all form fields are set
    if (isset($_POST["f_name"]) && isset($_POST["f_email"]) && isset($_POST["f_contact"]) && isset($_POST["f_enquirydate"]) && isset($_POST["f_topic"]) && isset($_POST["state"]) && isset($_POST["zip"])) {
        // Collect form data
        $t_stud_nm = $_POST["f_name"];
        $t_stud_email = $_POST["f_email"];
        $t_stud_contact = $_POST["f_contact"];
        $t_state = $_POST["state"];
        $t_pincode = $_POST["zip"];
        $t_enq_date = $_POST["f_enquirydate"];
        $t_topic = $_POST["f_topic"];

        // Insert data into MySQL database
        $sql = "INSERT INTO courses_enq (t_stud_nm, t_stud_email, t_stud_contact, t_state, t_pincode, t_enq_date, t_topic) VALUES ('$t_stud_nm', '$t_stud_email', '$t_stud_contact', '$t_state', '$t_pincode', '$t_enq_date', '$t_topic')";
        if ($conn->query($sql) === TRUE) {
             echo "<script>alert('Data saved successfully');window.location.href='courses_enq.php';</script>";
            ;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All form fields are required.";
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
    <title>Enquiry Form</title>
    <style>
        /* Adjust label alignment */
        .form-label {
            text-align: left;
            padding: 30px;
        }

        /* Ensure equal width for labels and inputs */
        .form-label,
        .form-control {
            width: 100%;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Enquiry Form -->
                <form id="enquiryForm" action="enquiry.php" method="post">
                    <h5>Enquiry Form</h5>
                    <div class="mb-3 row">
                        <label for="f_name" class="col-sm-4 col-form-label">Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f_name" name="f_name">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="f_email" class="col-sm-4 col-form-label">Email:</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="f_email" name="f_email">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="f_contact" class="col-sm-4 col-form-label">Contact:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f_contact" name="f_contact">
                        </div>
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
                                    <option value="HimachalPradesh">HimachalPradesh</option>
                                    <option value="JammuKashmir">JammuKashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="MadhyaPradesh">MadhyaPradesh</option>
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
                                    <option value="TamilNadu">TamilNadu</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="UttarPradesh">UttarPradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="WestBengal">WestBengal</option>
                                    <option value="AndamanNicobar">AndamanNicobar</option>
                                    <option value="DamanDiu">DamanDiu</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Puducherry">Puducherry</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="zip" class="col-sm-4 col-form-label">Pin Code:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Pin Code" required>
                        </div>
                    </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="f_topic" class="col-sm-4 col-form-label">Topic:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="f_topic" name="f_topic">
                        </div>
                    </div>
                    <div class="text-center">
                        <!-- <button type="submit" class="btn btn-success">Submit</button> -->
                        <a href="" class="btn btn-primary"> submit</a>





                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('enquiryForm').addEventListener('submit', function(event) {
            var name = document.getElementById('f_name').value;
            var email = document.getElementById('f_email').value;
            var contact = document.getElementById('f_contact').value;
            var enquiryDate = document.getElementById('f_enquirydate').value;
            var topic = document.getElementById('f_topic').value;
            var state = document.getElementById('state').value;
            var zip = document.getElementById('zip').value;

            if (name.trim() === '' || email.trim() === '' || contact.trim() === '' || enquiryDate.trim() === '' || topic.trim() === '' || state.trim() === '' || zip.trim() === '') {
                alert('Please fill in all fields');
                event.preventDefault();
            } else if (!isValidEmail(email)) {
                alert('Please enter a valid email address');
                event.preventDefault();
            } else if (!isValidContact(contact)) {
                alert('Please enter a valid contact number');
                event.preventDefault();
            } else if (!isValidName(name)) {
                alert('Please enter a valid name');
                event.preventDefault();
            } else if (!isValidZip(zip)) {
                alert('Please enter a valid pin code');
                event.preventDefault();
            } else if (!isValidState(state)) {
                alert('Please select a state');
                event.preventDefault();
            }
        });

        function isValidEmail(email) {
            // Regular expression for validating email addresses
            var re = /\S+@\S+\.\S+/;
            return re.test(email);
        }

        function isValidContact(contact) {
            // Regular expression for validating contact numbers (10 digits)
            var re = /^\d{10}$/;
            return re.test(contact);
        }

        function isValidName(name) {
            // Regular expression for validating name to enter character only
            var re = /^[a-zA-Z\s]+$/;
            return re.test(name);
        }

        function isValidZip(zip) {
            // Regular expression for validating pin code (6 digits)
            var re = /^\d{6}$/;
            return re.test(zip);
        }

        function isValidState(state) {
            // Check if a state is selected
            return state !== '';
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

