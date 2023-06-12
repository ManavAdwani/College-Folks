<?php
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

$output = "";
$sql = mysqli_query($conn, "SELECT * FROM chat_users WHERE Name like '%{$searchTerm}%'");

if(mysqli_num_rows($sql)>0){
    include "data.php";
}else{
    $output .= "No User available with this name";
}
echo $output;
?>