<?php
//include "db_conn.php"
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
    // Collect form data
    $t_stud_nm = $_POST["f_name"];
    $t_stud_email = $_POST["f_email"];
    $t_stud_contact = $_POST["f_contact"];
    $t_enq_date = $_POST["f_enquirydate"];
    $t_topic = $_POST["f_topic"];

    // Insert data into MySQL database
    $sql = "INSERT INTO enquiry (t_stud_nm, t_stud_email, t_stud_contact,t_enq_date, t_topic) VALUES ('$t_stud_nm', '$t_stud_email', '$t_stud_contact','$t_enq_date', '$t_topic')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data saved successfully');window.location.href='enquiry.php';</script>";

        // header("Location: .php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Enquiry Form</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <!-- Enquiry Form -->
                <form id="enquiryForm" action="enquiry.php" method="post">
                    <h2>
                        <center>Enquiry Form</center>
                    </h2>
                    <div class="form-group">
                        <label for="f_name"> Name:</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" >
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="f_email"> Email:</label>
                        <input type="email" class="form-control" id="f_email" name="f_email" >
                    </div><br>
                    <div class="form-group">
                        <label for="f_contact"> Contact:</label>
                        <input type="text" class="form-control" id="f_contact" name="f_contact" >
                    </div><br>
                    <div class="form-group">
                        <label for="f_enquirydate"> Date of Enquiry :</label>
                        <input type="date" class="form-control" id="f_enquirydate" name="f_enquirydate" >
                    </div><br>
                    <div class="form-group">
                        <label for="f_topic"> Topic :</label>
                        <input type="text" class="form-control" id="f_topic" name="f_topic" >
                    </div><br>


                    <button type="submit" class="btn btn-success">Submit</button>


                </form>

            </div>
        </div>
    </div>

    <script>
        document.getElementById('enquiryForm').addEventListener('submit', function (event) {
            var name = document.getElementById('f_name').value;
            var email = document.getElementById('f_email').value;
            var contact = document.getElementById('f_contact').value;
            var enquiryDate = document.getElementById('f_enquirydate').value;
            var topic = document.getElementById('f_topic').value;

           if (name.trim() === '' || email.trim() === '' || contact.trim() === '' || enquiryDate.trim() === '' || topic.trim() === '') {
                alert('Please fill in all fields');
                event.preventDefault();
            } else if (!isValidEmail(email)) {
                alert('Please enter a valid email address');
                event.preventDefault();
            } else if (!isValidContact(contact)) {
                alert('Please enter a valid contact number');
                event.preventDefault(); 
            }
                else if (!isValidName(name)) {
                alert('Please enter a valid name');
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
            var re = /^[a-z A-Z]+$/; 
            return re.test(name); 
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>