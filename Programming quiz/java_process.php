<?php
$conn = mysqli_connect('localhost', 'root', '', 'college_folks');
if (!$conn) {
    echo "ERROR";
}

session_start();
// For First Question Score will be not there !
// This will create only after first question submitted
$email = $_SESSION['Email'];

if (!isset($_SESSION['score'])) {
    $_SESSION['score'] = 0;
}
if ($_POST) {
    // We need total score in process file too
    $query = "SELECT * FROM java_mcqs_question";
    $sql = mysqli_query($conn, $query);
    $total_questions = mysqli_num_rows($sql);

    // We need the question number from where it is submitted
    $numbers = $_POST['number'];
    // Taking full question
    $qu1 = "SELECT * FROM java_mcqs_question WHERE Question_Number = $numbers";
    $qu2 = mysqli_query($conn, $qu1);
    $qu3 = mysqli_fetch_assoc($qu2);
    $qt = $qu3['Question_text'];

    // Here we are storing the selected option by user
    $select_choice = $_POST['choice'];
    // Taking full option
    $s1 = "SELECT * FROM `java_mcqs_choices` WHERE `Id`=$select_choice";
    $s2 = mysqli_query($conn, $s1);
    $sr = mysqli_fetch_assoc($s2);
    $op = $sr['Options'];

    // what will be the next question number 
    $next = $numbers + 1;

    //Determine the correct choice for current question
    $query = "SELECT * FROM java_mcqs_choices WHERE Question_Number = $numbers AND Is_Correct =1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $correct_choice = $row['Id'];
    $full_op = $row['Options'];

    // Increase the score if correct
    if ($select_choice == $correct_choice) {
        $_SESSION['score']++;
    }

    // Redirect to the next question or final page
    if ($numbers == $total_questions) {
        $store1 = "INSERT INTO `user_selected_options`(Email, Question, Option_by_user, Correct_Option) VALUES ('{$email}', '{$qt}' ,'{$op}', '{$full_op}')";
        $store2 = mysqli_query($conn, $store1);
        if ($store2) {
            header("location:java_final.php");
        } else {
            header('location: phpbolte.com');
        }
    } else {
        $store1 = "INSERT INTO `user_selected_options`(Email, Question, Option_by_user, Correct_Option) VALUES ('{$email}', '{$qt}' ,'{$op}', '{$full_op}')";
        $store2 = mysqli_query($conn, $store1);
        if ($store2) {
            header("location:java_question.php?n=" . $next);
        } else {
            header('location: phpbolte.com');
        }
    }
}
