<?php
$id=$_GET['id'];

	include('admin/connections.php');
	mysqli_query($con,"delete from `nursery` where id='$id'");
	header('location:admin/admin.php');?>
<?php


