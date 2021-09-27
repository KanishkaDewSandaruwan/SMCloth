<?php require_once "inner_head.php"; 
require_once "user.php";?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>My Account</li>
        </ol>
        <h2>My Account</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
          <div class="row mt-5">
                    <div class="col-lg-8 mb-5 mb-lg-0">
                        <?php 
                          $viewquery = " SELECT * FROM customer where customer_id = '".$_SESSION['customer_id']."'";
                          $viewresult = mysqli_query($con,$viewquery);
                          $row = mysqli_fetch_assoc($viewresult); ?>


                          <h1 class="text-dark text-uppercase">My Profile</h1><br><br>
                          <!-- <div class="dropdown-divider"></div> -->
                          <div class="col-md-10">
                              <div class="row ml-3">  
                                 <h3 style="color: black;">Name : <?php echo $row['name']; ?></h3>
                              </div>
                              <div class="row ml-3">
                                 <h3 style="color: black;">Address : <?php echo $row['address']; ?></h3>
                              </div>
                              <div class="row ml-3">
                                 <h3 style="color: black;">Phone Number : <?php echo $row['phone']; ?></h3>
                              </div>
                              <div class="row ml-3">
                                 <h3 style="color: black;">Email : <?php echo $row['email']; ?></h3>
                              </div>
                          </div>

                      </div>
                          <div class="col-md-4">
                              <button type="button" name="submit" class="btn col-md-10 btn-lg p-2  btn-primary" data-toggle="modal" data-target="#editprofile" style="border-radius:20px; margin-top: 5%;">Edit Profile</button>
                              <button type="button" name="submit" class="btn col-md-10 btn-lg p-2  btn-primary" data-toggle="modal" data-target="#exampleModal" style="border-radius:20px; margin-top: 5%;">Change Password</button>
                              <button type="button" name="submit" class="btn col-md-10 btn-lg p-2  btn-primary" data-toggle="modal" data-target="#exampleModalemail" style="border-radius:20px; margin-top: 5%;">Change Email</button>
                              <button type="button" name="submit" class="btn col-md-10 btn-lg p-2  btn-danger" onclick="window.location.href='delete.php?customer_id=<?php echo $row['customer_id']; ?>'" style="border-radius:20px; margin-top: 5%;">Delete Account</button>
                          </div>
                    </div>
      </div>
    </section>

    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="" method="POST"> 
                          <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="password" name="cpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Password"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="password" name="npass" id="userPassword" class="form-control input-sm chat-input" placeholder="New Password"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="password" name="conpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Confirm Password"/>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="pass_change"  class="btn btn-primary">Save changes</button>
                          </div>
                           <?php
                            if(isset($_POST['pass_change']))
                            {


                            $currentpass=stripslashes($_REQUEST['cpass']);
                            $newpass=stripslashes($_REQUEST['npass']);
                            $confpass=stripslashes($_REQUEST['conpass']);
                            $g = $_SESSION['customer_id'];

                            if(!empty($currentpass)){
                              if(!empty($newpass)){
                                if(!empty($confpass)){

                                  $loginsql="SELECT * FROM customer WHERE password='".md5($currentpass)."'";
                                  $result=mysqli_query($con,$loginsql) or mysqli_errno();
                                  $rows=mysqli_fetch_assoc($result);

                                  $query5="SELECT password FROM customer WHERE customer_id='".$g."'";
                                  $sql5=mysqli_query($con,$query5);
                                  $row=mysqli_fetch_assoc($sql5);

                                  if(isset($rows['password'])==isset($row['password']))
                                  {
                                    if($newpass==$confpass){
                                      $query3="SELECT * FROM customer WHERE password='$newpass'";
                                      $sql3=mysqli_query($con,$query3);

                                      if(mysqli_num_rows($sql3)>0)
                                      {
                                        echo "password already Exsisted";
                                      }
                                      else
                                      {
                                          $query2="UPDATE customer SET password='".md5($newpass)."' WHERE customer_id='".$g."'";
                                          $sql2=mysqli_query($con,$query2);
                                          echo "<script type=\"text/javascript\"> alert(\"Password Update Successfull\"); window.location.href='logout.php'; </script>"; 
                                      }

                                    }else{ echo "<script>alert(\"Password is Not Match\");</script>";} 
                                  }else{ echo "<script>alert(\"Current Password is Wrong\");</script>";} 
                                }else{ echo "<script>alert(\"Enter Confirm Password\");</script>";} 
                              }else{ echo "<script>alert(\"Enter New Password\");</script>";} 
                            }else{ echo "<script>alert(\"Enter Current Password\");</script>";} 

                            }
                        ?>
                        </form>
                        </div>
                      </div>
                    </div>

                    <!-- Modal Edit Profile-->
                    <div class="modal fade" id="editprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Profile Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="" method="POST"> 
                          <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="text" name="name" id="name" class="form-control input-sm chat-input" placeholder="Your Name"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="phone" id="phone" class="form-control input-sm chat-input" placeholder="Phone Number"/>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="text" name="address" id="address" class="form-control input-sm chat-input" placeholder="Your Address"/>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="pass_detail"  class="btn btn-primary">Save changes</button>
                          </div>
                            <?php
                                if(isset($_POST['pass_detail']))
                                {


                                    $name = $_REQUEST['name'];
                                    $phone = $_REQUEST['phone'];
                                    $address = $_REQUEST['address'];
                                    $geID = $_SESSION['customer_id'];
                                    $cdate = date("Y/m/d m:H:s");


                                      
                                                if(!empty($name))
                                                  {
                                                    $query3="UPDATE customer SET name='$name' WHERE customer_id='".$geID."'";
                                                    $sql3=mysqli_query($con,$query3);
                                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                                                  }

                                                  if(!empty($address))
                                                  {
                                                    $query3="UPDATE customer SET address='$address' WHERE customer_id='".$geID."'";
                                                    $sql3=mysqli_query($con,$query3);
                                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";
                                                  }

                                                  if(!empty($phone))
                                                  {
                                                    if(preg_match("/^([0]([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                                        $query3="UPDATE customer SET phone='$phone' WHERE customer_id='".$geID."'";
                                                        $sql3=mysqli_query($con,$query3);
                                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"myaccount.php\";</script>";

                                                      }else{echo "Enter Valid Phone Number";}
                                                  }


                                }
                            ?>
                        </form>
                        </div>
                      </div>
                    </div>
                         <!-- Modal -->
                    <div class="modal fade" id="exampleModalemail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: center;">Change Email</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <form action="" method="POST"> 
                          <div class="modal-body">

                              <div class="form-row">
                                  <div class="form-group col-md-12">
                                    <input type="email" name="cemail" id="userPassword" class="form-control input-sm chat-input" placeholder="Current Email"/>
                                  </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-12">
                                  <input type="email" name="nemail" id="userPassword" class="form-control input-sm chat-input" placeholder="New Email"/>
                                </div>
                              </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit"  class="btn btn-primary">Save changes</button>
                          </div>
                          <?php
                                if(isset($_POST['submit']))
                                {

                                $currentemail=stripslashes($_REQUEST['cemail']);
                                $newemail=stripslashes($_REQUEST['nemail']);
                                $g = $_SESSION['customer_id'];

                                if(!empty($currentemail)){
                                  if(!empty($newemail)){
                                    if(filter_var($newemail, FILTER_VALIDATE_EMAIL)){

                                      $loginsql="SELECT * FROM customer WHERE email='".$currentemail."'";
                                      $result=mysqli_query($con,$loginsql) or mysqli_errno();
                                      $rows=mysqli_fetch_assoc($result);

                                      $query5="SELECT email FROM customer WHERE customer_id='".$g."'";
                                      $sql5=mysqli_query($con,$query5);
                                      $row=mysqli_fetch_assoc($sql5);

                                      if(isset($rows['email'])==isset($row['email']))
                                      {
                                          $query3="SELECT * FROM customer WHERE email='$newemail'";
                                          $sql3=mysqli_query($con,$query3);

                                          if(mysqli_num_rows($sql3)>0)
                                          {
                                            echo "<script>alert(\"Email already Exsisted\");</script>";
                                          }
                                          else
                                          {
                                              $query2="UPDATE customer SET email='".$newemail."' WHERE email='".$currentemail."'";
                                              $sql2=mysqli_query($con,$query2);
                                              echo "<script type=\"text/javascript\"> alert(\"Email Update Successfull\"); window.location.href='logout.php'; </script>"; 
                                          }
                                      }else{ echo "<script>alert(\"Current Email is Wrong\");</script>";} 
                                  
                                    }else{ echo "<script>alert(\"Enter Valid Email\");</script>";} 
                                  }else{ echo "<script>alert(\"Enter New Email\");</script>";} 
                                }else{ echo "<script>alert(\"Enter Current Email\");</script>";} 

                                }
                            ?>
                        </form>
                        </div>
                      </div>
                    </div>

  </main><!-- End #main -->
<?php $viewquery = "SELECT * FROM about";
    $viewresult = mysqli_query($con,$viewquery);
    $row = mysqli_fetch_assoc($viewresult); ?>
  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12 col-md-6">
            <div class="footer-info">
              <h3>SM Clothing</h3>
              <p><?php echo $row['address']; ?><br>
                <strong>Phone:</strong> +94 <?php echo $row['phone']; ?><br>
                <strong>Email:</strong> <?php echo $row['email']; ?><br>
              </p>
              <div class="social-links mt-3">
                <a href="<?php echo $row['facebook']; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="<?php echo $row['twiter']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?php echo $row['instragram']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

    <div class="container">
      <div class="text-muted">Copyright &copy; SM Clothing.2021.</div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>