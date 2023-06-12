<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "Error";
}

$by = $_GET['fn'];
$q = "SELECT * FROM `coding_submission` WHERE `Id` = '$by'";
$sql = mysqli_query($conn, $q);
$rows = mysqli_fetch_assoc($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MARKS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<form action="#" method="POST">
	<input type="text" name="name" value="<?php echo $rows['Submitted_By']; ?>" placeholder="Name">
	<input type="text" name="file_name" placeholder="File Name" value="<?php echo $rows['File_Name']; ?>">
	<input type="number" name="Marks" placeholder="Marks"></input>
	<button class="cancel"><a href="main.php"> Cancel</a></button>
	<button class="pay" name="submit" onclick="toggleForm();">Update Marks</button>
</form>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $marks = $_POST['Marks'];
    $update = "UPDATE `coding_submission` SET `Marks`=$marks WHERE `Id`=$by";
    $sql = mysqli_query($conn, $update);
    if($sql){
        header("location: main.php");
    }
    else{
        echo "ERROR";
    }
}

?>