<?php
session_start();

    include("connections.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD']=="POST"){

        //Something was posted
       $name = $_POST['name'];
       $password = $_POST['password'];

       if(!empty($name) && !empty($password) && !is_numeric($name)){
        //read from database
        $query = "select * from cupid where post = 'manager' limit 1";
        $result= mysqli_query($con,$query);

        if($result){
            if($result && mysqli_num_rows($result)>0 ){
                $user_data=mysqli_fetch_assoc($result);
                //check if the entry is a manager and the password is correct
                if ($user_data['post']=='manager'&&$user_data['password']===$password) {
                   $_SESSION['cupid_id']=$user_data['cupid_id'];
                    
                   header("Location:admin.php");
                    die;             
                }
            }
        }

        echo "You are not an admin. Wrong username or password";
       
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
    <title>Login | Cupids Test</title>
      <!--logo icon in title bar-->
      <link rel="icon" href="/images/logo.jpg" type="image/x-icon">
    <!--styles-->
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<a href="../index.php">Home</a>

    <h1>WELCOME TO CUPIDS FOUNDATION</h1>
    <div id="box">
        <form method="post">
            <div style="font-size:20px; margin: 10px; color: white">Login as Admin</div>
            <input id="text" type="text" name="name" placeholder="Enter username"> <br><br>
            <input id= "text" type="password" name="password" placeholder="Enter password"><br><br>

            <input id="button" type="submit" value="Login"><br><br>
            

        </form>
    </div>
  
    
</body>
</html>