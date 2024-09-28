<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Center Status</title>
    <style>
   
   body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        table {
            width: 60%;
            margin-top: -70px; /* Adjust margin top for spacing */
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: 150px;
            padding: 20px;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #008B8B;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f0f8ff;
        }

        tr:hover {
            background-color: #F0FFFF;
        }

        /* Button container styles */
        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 12px 20px;
            font-size: 14px;
            border: none;
            background-color: #008B8B;
            color: white;
            cursor: pointer;
            border-radius: 4px;
        }

        /* Back button styles */
        .button-container2 {
            position: fixed;
            bottom: 20px;
            left: 260px; /* Adjust left position as needed */
            z-index: 999;
            
        }

        .button-container2 a {
            display: inline-block;
            padding: 10px;
            background-color: #008B8B;
            color: white;
            border-radius: 3px;
            text-decoration: none;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            .button-container2 {
                left: 10px; /* Adjust left position for small screens */
            }
        }

</style>

</head>

<body>  
<?php include "a_dashb.php"; // Include the dashboard content ?>
    <!-- <h1>Center Status</h1> -->
    <br>
    <form method="post" action="hm_enq_status.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Enquiry Topic</th>
                <th>Status</th>
            </tr>

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

            // Retrieve data from database
            $sql = "SELECT * FROM hmenq";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["t_enquiry_id"];
                    $stud_name = $row["t_stud_nm"];
                    $email = $row["t_stud_email"];
                    $contact = $row["t_stud_contact"];              
                    $enq_topic = $row["t_topic"];
                    $status = $row["status"];
                    
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$stud_name</td>";
                    echo "<td>$email</td>";
                    echo "<td>$contact</td>";                   
                    echo "<td>$enq_topic</td>";
                    echo "<td><input type='checkbox' name='status[]' value='$id'";
                     if ($status == 1) {
                        echo " checked";
                    }
                    echo "></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
            }

            $conn->close();
            ?>
            
        </table>
        </div>

<div class="button-container">
    <button type="submit">Save Changes</button>
</div>
</form>

<!-- Back button -->
<div class="button-container2">
<a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
</div>
</body>

</html>
