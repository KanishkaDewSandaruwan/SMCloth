<?php
	require_once 'connection.php'; //insert connection to page

	if(!isset($_SESSION['customer_id'])){
		echo "<script type=\"text/javascript\">window.location= \"login.php\";</script>";
	}else{
		$id = $_SESSION['customer_id'];
		$viewquery = " SELECT * FROM customer where customer_id = '$id'";
        $viewresult = mysqli_query($con,$viewquery); 
        $row1 = mysqli_fetch_assoc($viewresult);

        if (!isset($row1['name'])) {
        	echo "<script type=\"text/javascript\"> window.location= \"login.php\";</script>";
        }
	}
?>