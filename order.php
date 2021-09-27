<?php 
require_once 'connection.php';
session_start();
require_once 'user.php';

$getID = $_SESSION['customer_id'];
$total = $_REQUEST['total'];

$viewquery = " SELECT * FROM cart where customer_id = '$getID'";
$viewresult = mysqli_query($con,$viewquery);
$row = mysqli_fetch_assoc($viewresult);

$viewquery_cus = " SELECT * FROM customer where customer_id = '$getID'";
$viewresult_cus = mysqli_query($con,$viewquery_cus);
$row1 = mysqli_fetch_assoc($viewresult_cus);

$cus_id = $row1['customer_id'];
$payment_type = "COD";
$address = $row1['address'];
$cdate = date("Y/m/d m:H:s");
$product_ids = "";
$accept = "Pending";

$noarray=array();
$i = 0;

$viewquery2 = " SELECT * FROM cart where customer_id = '$getID'";
$viewresult2 = mysqli_query($con,$viewquery2);

while($row2 = mysqli_fetch_assoc($viewresult2)){
   	$noarray[$i] = $row2['product_id'];     
  	$i++;
}
$List = implode(',', $noarray); 

    $q1="INSERT INTO getorder(products,total,payment_type,address,trn_date,customer_id,status) values('$List','$total','$payment_type','$address','$cdate','$cus_id','$accept')";
    $res1=mysqli_query($con,$q1);


    if ($res1) {
        $query1="DELETE FROM cart WHERE customer_id='$getID '";
        mysqli_query($con,$query1);
    }
        echo '<script>alert("Your Order Sending Success"); window.location.href="myorders.php";</script>';



?>