<?php
include_once "config.php";

// echo $uid2;
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email =  mysqli_real_escape_string($conn, $_POST['email']);
if(!empty($name) && !empty($email)){
    // Let's Check that name is already in the database or not
    $sql = mysqli_query($conn, "SELECT name FROM chat_users WHERE Name = '{$name}'");
    if(mysqli_num_rows($sql) > 0){
        $sql4 = mysqli_query($conn, "SELECT * FROM chat_users WHERE email='{$email}'");
        if(mysqli_num_rows($sql4)>0){
            $rows = mysqli_fetch_assoc($sql4);
            // session_start();
            
            $_SESSION['Unique_id'] = $rows['Unique_id']; // We will use this unique id in others files
        }
        echo "success";
    }else{
        // Let's check image is uploaded or not
        if(isset($_FILES['dp'])){
            $img_name = $_FILES['dp']['name'];// Getting file name
            $img_type = $_FILES['dp']['type']; // geting type
            $tmp_name = $_FILES['dp']['tmp_name'];

            // Checking file is in image form or not
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode); // Get the extension of image

            $extension = ['png', 'jpeg', 'jpg']; // These are valid image extensions 
            if(in_array($img_ext, $extension)=== true){ // If matched then
                $time = time(); // we need this because we are changing every file name to its uploading time because with that every file will have unique name
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name, "dp/".$new_img_name)){
                    $Status = "Online";
                    $uid =  $_SESSION['uniqueid']; // creating random number id for user
                    // $_SESSION['Unique_id'] = $uid; 
                    $uid2 = $_SESSION['unique_idd'];
                    // insert data into the sql
            $sql2 = mysqli_query($conn, "INSERT INTO chat_users (Unique_id, Name,Email, image, Status) VALUES ({$uid2}, '{$name}', '{$email}','{$new_img_name}', '{$Status}')");
                    if($sql2){
                        $sql3 = mysqli_query($conn, "SELECT * FROM chat_users WHERE email='{$email}'");
                        if(mysqli_num_rows($sql3)>0){
                            $rows = mysqli_fetch_assoc($sql3);
                            // session_start();
                            
                            $_SESSION['Unique_id'] = $rows['Unique_id']; // We will use this unique id in others files
                            echo "success";
                        }
                    }
                    else{
                        echo "ERROR";
                    }
                }
            }else{
                echo "Can upload only png, jpeg or jpg";
            }

        }
        else{
            echo "Select an Image";
        }
    }
}else{
    echo "All input values are Required";
}
