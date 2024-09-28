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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $course_name = $_POST['course_name'];

    // Authenticate user
    $sql = "SELECT * FROM students WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['student_id'] = $row['id'];
        $_SESSION['email'] = $row['email'];

        // Enroll student in the course
        $student_id = $row['id'];
        $sql = "INSERT INTO student_courses (student_id, course_name) VALUES ('$student_id', '$course_name')";
        if ($conn->query($sql) === TRUE) {
            echo "Enrolled successfully!";
            // Redirect to student dashboard
            header("Location: student_dashboard.php");
            exit();
        } else {
            echo "Error enrolling course: " . $conn->error;
        }
    } else {
        echo "Invalid email or password.";
    }
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
</head>
<body>
    <h2>Student Login</h2>
    <form method="POST" action="">
        <input type="hidden" name="course_name" value="<?php echo htmlspecialchars($_GET['course_name']); ?>">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
