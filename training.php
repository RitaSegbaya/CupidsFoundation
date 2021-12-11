<?php
session_start();

    include("admin/connections.php");
    include("functions.php");

    //checks if user is logged in and redirects to login page if not
    $user_data = check_login($con);

    

    if($_SERVER['REQUEST_METHOD']=="POST"){

        //Something was posted
       $name = $_POST['name'];
       $projectname = $_POST['projectname'];
       echo $name;
       echo $projectname;
    

       if(!empty($name) && !empty($projectname) && !is_numeric($name)){
        //saves to database
        $query = "insert into nursery (name,projectname) values ('$name','$projectname')";
        mysqli_query($con,$query);

        //redirects to home page when record is registered
        if(true){echo "<script language='javascript'>; 
        alert('Project registration successful');
        window.location.href='index.php';
        </script>";}

        
       
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
    <title>Services | Cupids Foundation</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     <!--logo icon in title bar-->
     <link rel="icon" href="/images/logo.jpg" type="image/x-icon">
    <!--styles-->
    <link rel="stylesheet" href="../styles.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
   
</head>

<header>
    <div class="nav">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            
        </ul>
    </nav>
    <nav>
        <ul>
            <li><a href="login/logout.php">Logout</a></li>
        </ul>
    </nav>
    </div>
</header>
<body>
<br>
    Hello, <?php echo $user_data['name'];?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Join a project or training program</h2>
                    <p>Please fill this form and submit to join project.</p>
                    <form method="post" action="training.php">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $user_data['name'];?>">
                            
                        </div>
                        <div class="form-group">
                            <label>Program or Training of Choice</label>
                            <select name="projectname" id="projectname">
                                <option value="select a project">Select one</option>
                                <option value="activatenow">ActivateNow</option>
                                <option value="savethemyoung">SaveThemYoung</option>
                                <option value="spreadaware">SpreadAware</option>
                                <option value="standup">StandUp</option>
                                <option value="startnow">StartNow</option>
                                <option value="workitout">WorkitOut</option>
                                <option value="zerorape">ZeroRape</option>
                                
                                </select>
                         
                        </div>
                        
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body> 