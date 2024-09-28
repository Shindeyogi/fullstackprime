<?php
session_start();
session_destroy();
header('Location: admin2.php');
exit();
?>
