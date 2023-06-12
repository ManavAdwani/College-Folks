<?php
include_once "php/config.php";
				$_SESSION['loggedin'] = true;
// session_start();
if (!isset($_SESSION['Unique_id'])) {
    header('location: ../main.php');
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
            <section class="user">
                <header>
                    <?php
                $sql = mysqli_query($conn, "SELECT * FROM chat_users WHERE Unique_id = {$_SESSION['Unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                    $rows = mysqli_fetch_assoc($sql);
                }

                    ?>
                    <div class="content">
                        <img src="php/dp/<?php echo $rows['image']?>" alt="" srcset="">
                        <div class="details">
                            <span><?php echo $rows['Name']; ?></span>
                            <p><?php echo $rows['Status']; ?></p>
                        </div>
                    </div>
                    <a href="./logout.php" class="logout">LOGOUT</a>
                </header>

                <div class="search">
                    <span class="text">Select an User to Chat</span>
                    <input type="text" name="" id="" placeholder="Enter name to Search....">
                    <button><i class="fa fa-search"></i></button>
                </div>

                <div class="user-list">
                   
                </div>
            </section>
        </div>
    </div>

</body>
<script src="script.js"></script>
<script src="user.js"></script>

</html>