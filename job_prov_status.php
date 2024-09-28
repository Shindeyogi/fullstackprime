
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>

<body>
    <h1>Employer Signup Status</h1>

    <form method="post" action="employer_status.php">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
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
            $sql = "SELECT * FROM employer_signup";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $id = $row["t_emp_id"];
                    $name = $row["t_emp_name"];
                    $email = $row["t_emp_email"];
                    $status = $row["status"];

                    echo "<tr>";
                    echo "<td>$name</td>";
                    echo "<td>$email</td>";
                    echo "<td><input type='checkbox' name='status[]' value='$id'";
                    if ($status == 1) {
                        echo " checked";
                    }
                    echo "></td>";
                    echo "</tr>";
                }
            } else {
                echo "No records found";
            }

            $conn->close();
            ?>
        </table>

        <button type="submit">Save Changes</button>
    </form>
</body>

</html>

