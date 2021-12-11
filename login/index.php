<?php
session_start();

include("connections.php");
include("functions.php");

//checks if user has logged in and redirects to login page if not
$user_data = check_login($con);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cupids Test</title>
    <!--logo icon in title bar-->
    <link rel="icon" href="/images/logo.jpg" type="image/x-icon">
    <!--styles-->
    <link rel="stylesheet" href="../styles.css">
</head>

<header>
    <div class="nav">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="training.php">Training</a></li>
            <li>
                <a href="/contacts.php">Contact</a>
            </li>
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    </div>
</header>
<body>
    
   

    <br>
    Hello, <?php echo $user_data['name'];?>

   

</body>
</html>