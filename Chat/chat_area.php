<?php


// error_reporting(0);
include_once "php/config.php";
if (!isset($_SESSION['Unique_id'])) {
    echo "EERR";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Folks - Chat</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

<body>
    <nav id="nav">
        <div class="menu-icon">
            <span class="fa fa-bars"></span>
        </div>
        <div class="logo">
            College Folks
        </div>
        <div class="nav-items">
            <li><a href="#">Home</a></li>
            <li><a href="../College Folks/Profile/main.php">Your Profile</a></li>
            <li><a href="../College Folks/projects/main.php">Projects</a></li>
            <li><a href="../College Folks/Quiz/main.html">Quiz</a></li>
            <li><a href="../College Folks/Chat/main.php">Chat</a></li>
            <li><a href="#">Time-Table</a></li>
        </div>
        <div class="search-icon">
            <span class="fa fa-search"></span>
        </div>
        <div class="cancel-icon">
            <span class="fa fa-times"></span>
        </div>
    </nav>
    <div class="main-wrapper">
        <div class="wrapper">
            <section class="chat-area">
                <header>
                    <?php
                    $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                    // $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                   $sql = mysqli_query($conn, "SELECT * FROM chat_users WHERE Unique_id = {$user_id}");
                    if (mysqli_num_rows($sql) > 0) {
                        $rows = mysqli_fetch_assoc($sql);
                    } else {
                        header("location: users.php");
                    }

                    ?>
                    <a href="user.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
                    <img src="php/dp/<?php echo $rows['image'] ?>" alt="" srcset="">
                    <div class="details">
                        <span><?php echo $rows['Name']; ?></span>
                        <p><?php echo $rows['Status']; ?></p>

                </header>
                <div class="chat-box">
                   

                </div>
                <form action="" class="typing-area">
                    <!-- Will use hiddent input value to see who sent the message -->
                    <input type="text" name="outgoing_id" value="<?php echo $_SESSION['Unique_id']; ?>" hidden>
                    <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                    <input type="text" class="input-field" name="message" placeholder="Type message here">
                    <button><i class="fa fa-send"></i></button>
                </form>
            </section>
        </div>
    </div>
    <br><br><br><br><br>
</body>
<script src="./chat.js"></script>
<script src="script.js"></script>


</html>