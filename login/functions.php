<?php

function check_login($con){

    if(isset($_SESSION['cupid_id'])){

        $id=$_SESSION['cupid_id'];
        $query="select * from cupid where cupid_id='$id' limit 1";

        $result = mysqli_query($con,$query);
        if($result && mysqli_num_rows($result)>0 ){
            $user_data=mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}

//creating random cupid id
function random_num($length){
    $text="";
    if($length<5){
        $length=5;
    }
    $len = rand(4,$length);
    
    for ($i=0;$i<$len; $i++){
        $text=rand(0,6);
    }
    return $text;
}
