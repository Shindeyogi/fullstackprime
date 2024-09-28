<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Status</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th, td {
        padding: 8px; /* Reduce padding for table cells */
        text-align: left;
        font-size: 14px; /* Reduce font size for table content */
        border: 1px solid #ddd;
    }

    th {
        padding: 12px; /* Reduce padding for table headers */
        background-color: skyblue;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f0f8ff; /* Sky blue background for even rows */
    }

    tr:hover {
        background-color: lightcyan;
    }

    form {
        margin: 0 auto;
        height: 10px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    button {
        display: block;
        width: auto; /* Allow button width to adjust based on content */
        padding: 8px; /* Reduce padding for button */
        font-size: 14px; /* Reduce font size for button text */
        border: none;
        background-color: skyblue;
        color: #fff;
        cursor: pointer;
        border-radius: 4px;
        margin-top: 10px; /* Reduce top margin */
    }
</style>


</head>

<body>
    <h1>Employee Signup Status</h1>
    <br>
    <form method="post" action="employee_status.php">
        
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Gender</th>
                
                <th>Profile Photo</th>
                <th>Resume</th>
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
$sql = "SELECT * FROM employee_sign_up";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row["t_employe_id"];
        $name = $row["t_employe_nm"];
        $email = $row["t_employe_email"];
        $contact = $row["t_employe_contact"];
        $gender = $row["employee_gender"];
        //$dob = $row["t_employe_dob"];
        $profile_photo = $row["t_profile_photo"];
        $resume = $row["t_employe_resume"];
        $status = $row["status"]; // Retrieve the status from the database

        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$email</td>";
        echo "<td>$contact</td>";
        echo "<td>$gender</td>";
        //echo "<td>$dob</td>";      
        echo "<td>$profile_photo</td>";
        echo "<td>$resume</td>";
        echo "<td><input type='checkbox' name='status[]' value='$id'";
        if ($status == 1) {
            echo " checked";
        }
        echo "></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='10'>No records found</td></tr>";
}

$conn->close();
?>

        </table>

        <button type="submit">Save Changes</button>
    </form>
</body>

</html>
