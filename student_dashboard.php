<?php
session_start();
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

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: student22.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch enrolled courses
$sql = "SELECT course_name FROM student_courses WHERE student_id='$student_id'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $_SESSION['email']; ?></h2>
    <h3>Your Enrolled Courses:</h3>
    <ul>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<li>" . $row['course_name'] . "</li>";
            }
        } else {
            echo "<li>No courses enrolled yet.</li>";
        }
        ?>
    </ul>
    <a href="logout.php">Logout</a>
</body>
</html>
<?php
// Close database connection
$conn->close();
?>
