<?php
// Database credentials
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

// Fetch data from the tasks table
$sql = "SELECT t_tech_task_nm, t_tech_task_team, t_tech_task_deadline FROM tech_task";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <center> <title>Task List</title></center>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 50px;
            background-color: #f2f2f2;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: skyblue;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: lightcyan;
        }
    </style>
</head>
<body>
   <center> <h2 class="mt-5">Task List</h2></center>
    <table>
        <tr>
            <th>Task Name</th>
            <th>Team Member</th>
            <th>Deadline</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['t_tech_task_nm'] . "</td>";
                echo "<td>" . $row['t_tech_task_team'] . "</td>";
                echo "<td>" . $row['t_tech_task_deadline'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No tasks found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
