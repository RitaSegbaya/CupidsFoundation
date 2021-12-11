<?php
require_once 'admin/connections.php';
include ('admin/functions.php');


if($_SERVER['REQUEST_METHOD']=="POST"){

    //Something was posted
    $name= $_POST['name'];
    $project=$_POST['projectname'];

   if(!empty($name) && !empty($project) && !is_numeric($name)){
    //read from database
    $select="select projectname from nursery where projectname=?";
    $query = "insert into nursery (name, projectname) values (?,?)";
    $result= mysqli_query($con,$query);

    //prepare statement
    $stmt=$con->prepare($select);
    $stmt->bind_param("s",$project);
    $stmt->execute();
    $stmt->bind_result($project);
    $stmt->store_result();
    $rnum=$stmt->num_rows;

    if($rnum==0){
        $stmt->close;

        $stmt=$con->prepare($query);
        $stmt->bind_param("sss",$name,$project);
        stmt->execute();
        
        if(true){echo "<script language='javascript'>; 
            alert('New Record Success');
            window.location.href='admin/admin.php';
            </script>";}
    }

//    // if($result){
//         if($result && mysqli_num_rows($result)>0 ){
//             $user_data=mysqli_fetch_assoc($result);
//             echo "New record inserted";
            
                
//                header("Location:../index.php");
//                 die;             
//             }
//         }
//     }

//     echo "Please choose a program";
   
//    }else{
//        echo "Please enter valid information";
//    }
}


