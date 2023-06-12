<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Project Upload</title>
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="uploadfile" id="">
        <br>
        <br>
        <input type="submit" name="submit" value="Upload Projects">
    </form>

</body>

</html>

<?php


$filename = $_FILES["uploadfile"]["name"];
$temp_name = $_FILES["uploadfile"]["tmp_name"];
// print_r($_FILES["uploadfile"]); 
$folder = "images/" . $filename;

move_uploaded_file($temp_name, $folder);

echo "<img src='$folder' alt='' height='100px' width='100px'>";
?>