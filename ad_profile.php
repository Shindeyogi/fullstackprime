<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header('Location: admin2.php');
    exit();
}

$admin_name = $_SESSION['admin_name'];
$admin_email = $_SESSION['admin_email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Admin Profile</title>
</head>

<body>
    <div class="container mt-5">
        <h1>Profile</h1>
        <p>Name: <?php echo $admin_name; ?></p>
        <p>Email: <?php echo $admin_email; ?></p>
        <a href="admindash2.php">Back to Dashboard</a>
    </div>
</body>

</html>
