<?php 

require_once 'connection.php';
require_once 'admin.php'; //Check login 

if(isset($_REQUEST['accept']))
{
	$id = $_REQUEST['accept'];

		$query3="UPDATE getorder SET status='Accepted' WHERE order_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"order.php\";</script>";
}
else if(isset($_REQUEST['reject']))
{
	$id = $_REQUEST['reject'];

		$query3="UPDATE getorder SET status='Reject'  WHERE order_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"order.php\";</script>";
}

else if(isset($_REQUEST['paided']))
{
	$id = $_REQUEST['paided'];

		$query3="UPDATE getorder SET status='Paid'  WHERE order_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"order.php\";</script>";
}
else if(isset($_REQUEST['shiped']))
{
	$id = $_REQUEST['shiped'];

		$query3="UPDATE getorder SET status='Shipped' WHERE order_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"order.php\";</script>";
}
else if(isset($_REQUEST['diliverd']))
{
	$id = $_REQUEST['diliverd'];

		$query3="UPDATE getorder SET status='Diliverd' WHERE order_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"order.php\";</script>";
}
else if(isset($_REQUEST['deletecomplete']))
{
	$id = $_REQUEST['deletecomplete'];

		$query3="DELETE FROM getorder WHERE order_id='$id '";
		$sql3=mysqli_query($con,$query3);

		
		
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"order.php\";</script>";
}

 ?>