<?php 

require_once 'connection.php';
require_once 'admin.php'; //Check login 

if(isset($_REQUEST['accept']))
{
	$id = $_REQUEST['accept'];

		$query3="UPDATE medication SET status='Accepted' WHERE medication_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"pre.php\";</script>";
}
else if(isset($_REQUEST['reject']))
{
	$id = $_REQUEST['reject'];

		$query3="UPDATE medication SET status='Reject'  WHERE medication_id='".$id."'";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"pre.php\";</script>";
}
else if(isset($_REQUEST['shiped']))
{
	$id = $_REQUEST['shiped'];

		$viewquery = " SELECT * FROM medication where medication_id='".$id."'";
        $viewresult = mysqli_query($con,$viewquery);
        $row1 = mysqli_fetch_assoc($viewresult);
        if ($row1['payment'] != 'Pending') {

				$query3="UPDATE medication SET status='Shipped' WHERE medication_id='".$id."'";
				$sql3=mysqli_query($con,$query3);
			  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"pre.php\";</script>";
        }else{
        	echo "<script type=\"text/javascript\"> alert(\"Customer Need to Pay Befoure Deliver Medicins\"); window.location= \"pre.php\";</script>";
        }
}
else if(isset($_REQUEST['complete']))
{
	$id = $_REQUEST['complete'];

		$viewquery = " SELECT * FROM medication where medication_id='".$id."'";
        $viewresult = mysqli_query($con,$viewquery);
        $row1 = mysqli_fetch_assoc($viewresult);
        if ($row1['payment'] != 'Pending') {

				$query3="UPDATE medication SET status='Completed',payment='Paid' WHERE medication_id='".$id."'";
				$sql3=mysqli_query($con,$query3);
			  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"pre.php\";</script>";

		}else{
        	echo "<script type=\"text/javascript\"> alert(\"Customer Need to Pay Befoure Complete\"); window.location= \"pre.php\";</script>";
        }
}
else if(isset($_REQUEST['deletecomplete']))
{
	$id = $_REQUEST['deletecomplete'];

		$query3="DELETE FROM medication WHERE medication_id='$id '";
		$sql3=mysqli_query($con,$query3);
	  	echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"pre.php\";</script>";
}

 ?>