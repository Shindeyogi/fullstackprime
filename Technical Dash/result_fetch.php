<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tnp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM results";
$result = $conn->query($sql);

// Close connection (to be reopened later for insert operation)
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f2f2f2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #87CEEB; /* Sky blue */
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2; /* Light gray */
        }
        tr:hover {
            background-color: lightcyan;
        }
    </style>
</head>
<body>
   <center><h2 class="mt-5">Result</h2></center>
    <!-- Form for result submission -->
    <!-- Your existing form code here -->

    <!-- Table to display fetched data -->
    <h2 class="mt-5">Results</h2>
    <table>
        <tr>
            <th>Student Name</th>
            <th>Roll No</th>
            <th>Marks</th>
            <th>Result</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["student_name"] . "</td><td>" . $row["roll_no"] . "</td><td>" . $row["marks"] . "</td><td>" . $row["result"] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
        }
        ?>
    </table>

    <!-- Bootstrap JS and jQuery -->
    <!-- Your existing script imports here -->
</body>
</html>
