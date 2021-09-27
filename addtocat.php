<?php 
	require_once 'connection.php'; //insert connection to page

	session_start();
	if(!isset($_SESSION['customer_id'])){
		echo "<script type=\"text/javascript\"> alert(\"Please Signin First\"); window.location= \"login.php\";</script>";
	}
	
	$id = $_REQUEST['product_id'];
	$getID = $_SESSION['customer_id'];
	$cdate = date("Y/m/d m:H:s");

	echo $getID;
	$getDetail_Query = "SELECT * FROM product where product_id= '".$id."'";
	$getResult = mysqli_query($con,$getDetail_Query);

	$getCustomerDetail_Query = "SELECT * FROM customer where customer_id='".$getID."'";
	$getResult_Customer = mysqli_query($con,$getCustomerDetail_Query);

	$getCartDetail_Query = "SELECT * FROM cart where product_id= '".$id."'AND customer_id='".$getID."'";
	$getResult_Cart = mysqli_query($con,$getCartDetail_Query);

	if(mysqli_num_rows($getResult_Cart)>0){
	      echo "<script type=\"text/javascript\"> alert(\"This Product Alrady in Cart\"); window.location= \"index.php\";</script>";
	}else{
		if ($row = mysqli_fetch_assoc($getResult)) { 

			$price = $row['price'];
			

			$product_id = $row['product_id'];
			if ($row1 = mysqli_fetch_assoc($getResult_Customer)) {

				$qnty = '1';
				$q1="INSERT INTO cart(product_id,customer_id,price,qty,trn_date) values('$product_id','$getID','$price','$qnty','$cdate')";
                $res1=mysqli_query($con,$q1);

                if ($res1) {
                	echo "<script type=\"text/javascript\"> alert(\"Product Added to Cart\"); window.location= \"index.php\";</script>";
                }else{
                	echo "<script type=\"text/javascript\"> alert(\"Cart Adding Fail\"); window.location= \"index.php\";</script>";
                }
			
			}
		}
	}
 ?>