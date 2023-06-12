<?php
$conn = mysqli_connect('localhost', 'root','','college_folks');
if(!$conn){
    echo "ERROR";
}
$fn = $_GET['fn'];
echo $fn;

$q1 = "SELECT * FROM projects WHERE File_Name LIKE '$fn'";
$res = mysqli_query($conn, $q1);
// $sql = mysqli_fetch_assoc($res);

if(!empty($_GET['fn'])){
    $filename = basename($_GET['fn']);
    $filepath = '../project_files/'.$filename;
    if(!empty($filename) && file_exists($filepath)){
        //Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        readfile($filepath);
        exit;
    }
    else{
        echo "This File Does not exits";
    }
}

?>