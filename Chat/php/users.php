<?php
    // session_start();
    include_once "config.php";
    $sql = mysqli_query($conn, "SELECT * FROM chat_users");
    $output = "";
    if(mysqli_num_rows($sql)==1){
        $output .= "No Users are available";
    }elseif(mysqli_num_rows($sql)>0){
        include "data.php";
    }   
    echo $output;

?>