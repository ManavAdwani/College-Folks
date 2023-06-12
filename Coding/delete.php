<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}

$sb = $_GET['sb'];
// echo $uid;


$sql = "DELETE FROM coding_submission WHERE `coding_submission`.`Submitted_By` = '$sb'";
$res = mysqli_query($conn, $sql);
if($res){
    header("location: main.php");
}
else{
    echo "ERROR";
}

?>