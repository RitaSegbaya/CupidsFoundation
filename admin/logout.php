<?php

session_start();

if(isset($_SESSION['cupid_id'])){
    unset($_SESSION['cupid_id']);
}

header("Location:login.php");