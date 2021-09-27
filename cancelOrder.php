<?php 
require_once 'connection.php';
session_start();
require_once 'user.php'; //Check login 

if(isset($_REQUEST['order_id']))
{
	$id = $_REQUEST['order_id'];

		$query3="UPDATE getorder SET status='Cancel' WHERE order_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myorders.php\";</script>";
} ?>