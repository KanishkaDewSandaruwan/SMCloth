<?php 
require_once 'connection.php';
session_start();
require_once 'user.php'; //Check login 

if(isset($_REQUEST['medication_id']))
{
	$id = $_REQUEST['medication_id'];

		$query3="UPDATE medication SET status='Cancel' WHERE medication_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"mymedication.php\";</script>";
} ?>