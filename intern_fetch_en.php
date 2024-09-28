<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Internships Status</title>
    <style>
          body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        table {
            width: 60%;
            margin-top: -120px; /* Adjust margin top for spacing */
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-left: auto;
            margin-right: 90px;
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
    <h1>Event Status</h1>
    <br>
    <form method="post" action="intern_status_en.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>internship Name</th>
                <th>position </th>
                <th>about us</th>
                <th>location</th>
                <th>duration</th>
                <th>start Date</th>
                <th>Image</th>
                <th>requirements</th>
                <th>status</th>
                
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
            $sql = "SELECT * FROM internships";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];
                    $internship = $row["internship"];
                    $position = $row["position"];
                    $about = $row["about_us"];
                    $location = $row["location"];
                    $duration = $row["duration"];
                    $start_date = $row["start_date"];
                    $image = htmlspecialchars($row["image"]);
                    $req = $row["requirements"];
                    $status = $row["status"];
                    
                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>$internship</td>";
                    echo "<td>$position</td>";
                    echo "<td>$about</td>";
                    echo "<td>$location</td>";
                    echo "<td>$duration</td>";
                    echo "<td>$start_date</td>";
                    echo "<td><img src='$image' alt='Event Image' style='max-width: 150px; max-height: 150px;'></td>";
                    echo "<td>$req</td>";
                    
    
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
    <div class="button-container2">
        <a href="admindash2.php"><i class="fas fa-arrow-left"></i></a>
    </div>
</body>

</html>
