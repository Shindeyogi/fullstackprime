<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Status</title>
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
    <!-- <h1>Event Status</h1> -->
    <br>
    <form method="post" action="event_en_status.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Event Name</th>
                <th>Event Contact</th>
                <th>Event Location</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Event Time</th>
                <th>Event Image</th>
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
            $sql = "SELECT * FROM events";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["event_id"];
                    $eve_name = $row["event_name"];
                   // $email = $row["t_emp_email"];
                    $eve_contact = $row["event_contact"];
                    $eve_location = $row["event_location"];
                    //$city = $row["t_emp_city"];
                    $start_date = $row["start_date"];
                    $end_date = $row["end_date"];
                    $eve_time = $row["event_time"];
                  //  $gender = $row["t_emp_gender"];
                    $eve_image = htmlspecialchars($row["event_image"]);
                    $status = $row["status"];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$eve_name</td>";
                    echo "<td>$eve_contact</td>";
                    echo "<td>$eve_location</td>";
                    echo "<td>$start_date</td>";
                    echo "<td>$end_date</td>";
                    echo "<td>$eve_time</td>";
                    echo "<td><img src='$eve_image' alt='Event Image' style='max-width: 150px; max-height: 150px;'></td>";
      
                    echo "<td><input type='checkbox' name='status[]' value='$id'";
                    if ($status == 1) {
                        echo " checked";
                    }
                    echo "></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No records found</td></tr>";
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
