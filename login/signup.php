<?php
session_start();

    include("connections.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        //Something was posted
       $name = $_POST['name'];
       $email = $_POST['email'];
       $password = $_POST['password'];
       $post = $_POST['post'];

       if(!empty($name) && !empty($password) && !empty($email) && !empty($post) && !is_numeric($name)){
        //save to database
        $cupid_id=random_num(20);
        $query = "insert into cupid (cupid_id,name,email,password,post) values ('$cupid_id','$name','$email','$password', '$post')";
        mysqli_query($con,$query);

        //redirects to login page
       header("Location:login.php");
       die;

       }else{
           echo "Please enter valid information";
       }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup | Cupids Test</title>
      <!--logo icon in title bar-->
      <link rel="icon" href="/images/logo.jpg" type="image/x-icon">
    <!--styles-->
    <link rel="stylesheet" href="../styles.css">
    <script type=text/javascript src="/jquery.js"></script>
  <script src="ajax.js"></script>
</head>
<body>
<a href="../index.php">Home</a>
    
    <div id="box">
        <form method="post">
            <div style="font-size:20px; margin: 10px; color: white; text-align: center">SignUp</div>
            <input id="text" type="text" name="name" placeholder="Username"> <br><br>
            <input id="text" type="text" name="email" placeholder="Email"> <br><br>
            <input id="text" type="multi-select" name="post" placeholder="Post"> <br><br>
            <input id= "text" type="password" name="password" placeholder="Password"><br><br>
            

            <input id="button" type="submit" value="SignUp"><br><br>

            <a href="login.php" id="test">Click to Login</a>
        </form>
    </div>
    
  
    
</body>
</html>