<?php
session_start();
unset($_SESSION['Unique_id']);
// session_destroy($_SESSION['Unique_id']);

header("location: ../main.php");
exit();
?>