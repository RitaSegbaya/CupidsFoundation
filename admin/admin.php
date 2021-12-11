<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin|Cupids</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<a href="../index.php">Home</a>
<a href="logout.php">Logout</a>
<div class="wrapper" >
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">On This Platform</h2>
            
                    </div>

                    <!-- table to show all those who sign up -->
                    <?php
                    // Include connections file
                    require_once 'connections.php';
                    include('functions.php');
                    
                    
                    echo "Account users";
                    echo "</br>";
                    // Attempt select query execution for all users
                    $sql = "select * FROM cupid";
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Name</th>";
                                        echo "<th>Post</th>";
                                        echo "<th>Email</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['post'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
           
                    ?>
                    <!-- table to show projects we run till date -->
                    <?php
                    // Include connnections file
                    require_once "connections.php";
                    
                    echo "Projects Till Date";
                    // Attempt select query execution
                    $sql = "SELECT * FROM project";
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                            
                                        echo "<th>Project Name</th>";
                                        echo "<th>Start Date</th>";
                                        echo "<th>End Date</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['projectname'] . "</td>";
                                        echo "<td>" . $row['startdate'] . "</td>";
                                        echo "<td>" . $row['enddate'] . "</td>";
    
                                        echo "<td>";
                                            echo '<a href="../read.php?projectname='. $row['projectname'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="../insert.php?projectname='. $row['projectname'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="../delete.php?projectname='. $row['projectname'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                   
                    ?>
                     <!-- table to show longest running program -->
                    <?php
                    echo "Longest Running Program";
                     //select query execution for longest running program
                    $sql ="select *,DATEDIFF(enddate, startdate)/365 as 'Period',startdate as 'From',enddate as 'To' from project inner join training on training.projectname=project.projectname GROUP BY project.projectname ORDER BY Period DESC LIMIT 1";                     
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Project Name</th>";
                                        echo "<th>Period</th>";
                                        echo "<th>Start Date</th>";
                                        echo "<th>End Date</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['projectname'] . "</td>";
                                        echo "<td>" . $row['Period'] . "</td>";
                                        echo "<td>" . $row['startdate'] . "</td>";
                                        echo "<td>" . $row['enddate'] . "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
           
                    ?>
<!-- // table to show users and their projects -->
                    <?php
                    // Include connections file
                    require_once "connections.php";
                    
                    echo "Benefactor Projects";
                    // Attempt select query execution
                    $sql = "SELECT * FROM nursery";
                    if($result = mysqli_query($con, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                            
                                        echo "<th>Name</th>";
                                        echo "<th>Project</th>";
                                        echo "<th>Action</th>";
                                    
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['projectname'] . "</td>";
                                                                                
    
                                        echo "<td>";
                                            echo '<a href="../read.php?sid='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="../insert.php?sid='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="../delete.php?sid='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                   
                    ?>

                
                </div>
            </div>        
        </div>
    </div>
    
</body>
</html>






