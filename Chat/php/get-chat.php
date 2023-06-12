<?php

// session_start();
include_once "config.php";
if (isset($_SESSION['Unique_id'])) {
    $outgoing_id = $_SESSION['Unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);

    $output = "";
    // Join two tables
    $sql = "SELECT * FROM messages 
    LEFT JOIN chat_users ON chat_users.Unique_id = messages.outgoing_msg_id
    WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id}) OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";

    $query = mysqli_query($conn, $sql);

    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            if($row['outgoing_msg_id'] === $outgoing_id){ // if this is equal then its sender
                $output .= '<div class="chat outgoing">
                    <div class="details">
                        <p>'.$row['msg'] .'</p>
                    </div>
            </div>';
            }else{ // Receiver
                $output .= '<div class="chat incoming">
                    <img src="php/dp/'.$row['image'].'" alt="" srcset="">
                <div class="details">
                    <p>'.$row['msg'] .'</p>
                </div>
            </div>';
            }
        }
        echo $output;
    }
} else {
    header('location: ../main.php');
}

?>