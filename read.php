<?php
// Check existence of id parameter before processing further
if(isset($_GET["projectname"]) && !empty(trim($_GET["projectname"]))){
    // Include config file
    require_once "admin/connections.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM project WHERE projectname = ?";
    
    if($stmt = mysqli_prepare($con, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_projectname);
        
        // Set parameters
        $param_projectname = trim($_GET["projectname"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $projectname = $row["projectname"];
                $startdate = $row["startdate"];
                $enddate = $row["enddate"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                //header("location: error.php");
                //exit();
                echo "error1";
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($con);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    ///header("location: error.php");
    //exit();
    echo "error2";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <div class="form-group">
                        <label>Project Name</label>
                        <p><b><?php echo $row["projectname"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Start Date</label>
                        <p><b><?php echo $row["startdate"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>End Date</label>
                        <p><b><?php echo $row["enddate"]; ?></b></p>
                    </div>
                    <p><a href="admin/admin.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
