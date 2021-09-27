<?php
require_once 'connection.php';

if(isset($_REQUEST['product_id']))
{
          $id = $_REQUEST['product_id'];

          $querygetcode="SELECT  * FROM product where product_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['product_id'];

          $product_name = $result_row['product_name'];
          $description = $result_row['description'];
          $image = $result_row['image'];
          $product_id = $result_row['product_id'];


          $q1="INSERT INTO product_backup(product_name,description,image,product_id) values('$product_name','$description','$image','$product_id')";
          $res1=mysqli_query($con,$q1);

          if ($res1) {
            $query1="DELETE FROM product WHERE product_id='$a '";
            mysqli_query($con,$query1);

            header('location:product.php');
          }
}
else if(isset($_REQUEST['emp_id']))
{
          $id = $_REQUEST['emp_id'];

          $querygetcode="SELECT  * FROM employee where emp_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['emp_id'];

          $query1="DELETE FROM employee WHERE emp_id='$a '";
          mysqli_query($con,$query1);
          header('location:employee.php');

}
else if(isset($_REQUEST['m_id']))
{
          $id = $_REQUEST['m_id'];

          $querygetcode="SELECT  * FROM message where m_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['m_id'];

          $query1="DELETE FROM message WHERE m_id='$a '";
          mysqli_query($con,$query1);
          header('location:messege.php');

}  else if(isset($_REQUEST['image_id'])){
          $id = $_REQUEST['image_id'];

          $querygetcode="SELECT  * FROM galary where image_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['image_id'];

          $query1="DELETE FROM galary WHERE image_id='$a '";
          mysqli_query($con,$query1);
          header('location:galary.php');

}else if(isset($_REQUEST['cat_id'])){
          $id = $_REQUEST['cat_id'];

          $querygetcode="SELECT  * FROM category where cat_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['cat_id'];

          $querygetcode1="SELECT  * FROM product where cat_id ='".$a."'";
          $catresult1=mysqli_query($con,$querygetcode1);

          while($row=mysqli_fetch_assoc($catresult1)){

                $product_name = $row['product_name'];
                $description = $row['description'];
                $image = $row['image'];
                $product_id = $row['product_id'];


                $q1="INSERT INTO product_backup(product_name,description,image,product_id) values('$product_name','$description','$image','$product_id')";
                $res1=mysqli_query($con,$q1);

                if ($res1) {

                  $query1="DELETE FROM product WHERE cat_id ='$a'";
                  mysqli_query($con,$query1);

                }
            
          }
                  $query1="DELETE FROM category WHERE cat_id='$a '";
                  mysqli_query($con,$query1);
                  header('location:cat.php');

          
}

else if(isset($_REQUEST['customer_id']))
{
          $id = $_REQUEST['customer_id'];

          $querygetcode="SELECT  * FROM customer where customer_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['customer_id'];
          $g=$result_row['email'];

          $cdate = date("Y/m/d m:H:s");

            $viewquery = " SELECT * FROM customer where email='".$g."'";
              $viewresult = mysqli_query($con,$viewquery);
              if ($row = mysqli_fetch_assoc($viewresult)) {

                $name = $row['name'];
                $cus_id = $row['customer_id'];
                $phone = $row['phone'];
                $email = $row['email'];


              $q1="INSERT INTO customer_backup(customer_id,name,phone,email,trn_date) values('$cus_id','$name','$phone','$email','$cdate')";
                $res1=mysqli_query($con,$q1);

                if ($res1) {


              $query1="DELETE FROM customer WHERE email='$g '";
                      mysqli_query($con,$query1);

                      header('location:customer.php');
                }
              }
}
else{
  header('location:dashboard.php'); 
}
?>