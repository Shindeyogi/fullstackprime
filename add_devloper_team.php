<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp_k";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['full-name'];
    $description = $_POST['description'];
    $role = $_POST['role'];
    $qualification = $_POST['qualification'];
    $image = $_FILES['image'];

            $sql = "INSERT INTO developers(full_name, image, description, role, qualification) 
            VALUES ( $fullName, $target_file, $description, $role, $qualification)";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Developer added successfully');window.location.href='add_devloper_team.php';</script>";
     // header("Location: .php"); 
     exit();
 } else {
     
     echo "Error: " . $sql . "<br>" . $conn->error;
 }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Developer Team Member</title>
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
        #team-member-form {
        margin-top: -50px; /* Adjust this value as needed */
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
<?php include "a_dashb.php"; // Include the dashboard content ?>
    <div class="form-container">
        <!-- <h1>Add Developer Team Member</h1> -->
        <form id="team-member-form" action="devlop_team.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <label for="full-name">Full Name:</label>
                <input type="text" id="full-name" name="full-name" required>
                <div id="name-error" class="error-message"></div>
<br>
                <label for="image">Upload Image:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
                <div id="image-error" class="error-message"></div>
<br>
                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
                <div id="description-error" class="error-message"></div>
<br>
                <label for="role">Role in Project:</label>
                <select id="role" name="role" required>
                    <option value="" disabled selected>Select a role</option>
                    <option value="front-end">Front-end Developer</option>
                    <option value="back-end">Back-end Developer</option>
                    <option value="full-stack">Full Stack Developer</option>
                    <option value="ux-ui">UX/UI Designer</option>
                </select>
                <div id="role-error" class="error-message"></div>

                <label for="qualification">Qualification:</label>
                <input type="text" id="qualification" name="qualification" required>
                <div id="qualification-error" class="error-message"></div>
            </fieldset>

            <button type="submit" class="btn btn-success" name="Add">Add</button>
                </form>
                <div class="button-container2">
        <a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
    </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('team-member-form').addEventListener('submit', function(event) {
            let isValid = true;

            // Clear previous error messages
            document.getElementById('name-error').textContent = '';
            document.getElementById('image-error').textContent = '';
            document.getElementById('description-error').textContent = '';
            document.getElementById('role-error').textContent = '';
            document.getElementById('qualification-error').textContent = '';

            // Validate Full Name
            const fullName = document.getElementById('full-name').value;
            if (!fullName) {
                isValid = false;
                document.getElementById('name-error').textContent = 'Full Name is required.';
            }

            // Validate Image
            const image = document.getElementById('image').files[0];
            if (!image) {
                isValid = false;
                document.getElementById('image-error').textContent = 'Image is required.';
            } else if (!['image/jpeg', 'image/png', 'image/gif'].includes(image.type)) {
                isValid = false;
                document.getElementById('image-error').textContent = 'Invalid image format. Only JPEG, PNG, and GIF are allowed.';
            }

            // Validate Description
            const description = document.getElementById('description').value;
            if (!description) {
                isValid = false;
                document.getElementById('description-error').textContent = 'Description is required.';
            }

            // Validate Role
            const role = document.getElementById('role').value;
            if (!role) {
                isValid = false;
                document.getElementById('role-error').textContent = 'Role is required.';
            }

            // Validate Qualification
            const qualification = document.getElementById('qualification').value;
            if (!qualification) {
                isValid = false;
                document.getElementById('qualification-error').textContent = 'Qualification is required.';
            }

            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>