<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Fetch</title>
     <!-- Other meta tags and styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

    <!-- <h1>Trainer Signup Status</h1> -->
    <form method="post" action="trainer_status.php">
    <table>
        <tr>
            
            <th>ID</th>
            <th>Name</th>
            <th>Specialization</th>
            <th>Contact</th>
            <th>Email</th>
            <th>Status</th>
        </tr>

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
        
        // Retrieve data from the database with pagination
        $sql = "SELECT * FROM trainers";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id = $row["t_Tr_id"];
                $name = $row["t_Tr_name"];
                $specialization = $row["T_tr_Specialization"];
                $contact = $row["t_Tr_contact"];
                $email = $row["t_Tr_email"];
                $status = $row["status"];
                
                echo "<tr>";
                echo "<td>$id</td>";
                echo "<td>$name</td>";
                echo "<td>$specialization</td>";
                echo "<td>$contact</td>";
                echo "<td>$email</td>";
                
                echo "<td><input type='checkbox' name='status[]' value='$id'";
                if ($status == 1) {
                    echo " checked";
                }
                echo "></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        
        // Close the database connection
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