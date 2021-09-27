<?php 
    require_once "connection.php";
 ?>.
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> SM Clothing</title>
        <link rel="icon" type="image/png" href="img/logo/logo.jpg" sizes="300x300" />
        <link href="dashboard/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account - Senith Phamacy</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">Your Name</label>
                                                        <input class="form-control py-4" name="name" id="inputFirstName" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Phone Number</label>
                                                        <input class="form-control py-4" id="inputLastName" name="phone" type="text" placeholder="Enter Phone Number" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="email" name="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="address" aria-describedby="emailHelp" placeholder="Enter Your address" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">NIC Number</label>
                                                <input class="form-control py-4"  type="text" aria-describedby="emailHelp" name="nic" placeholder="Enter Your NIC" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control py-4" id="inputPassword" name="pass" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control py-4" id="inputConfirmPassword" name="confpass" type="password" placeholder="Confirm password" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                                <button class="btn btn-primary btn-block" type="submit" name="submit">Create Account</button>
                                            </div>
                                        </form>

                                        <?php 

                                            if (isset($_POST['submit'])) {

                                                $name = $_REQUEST['name'];
                                                $email = $_REQUEST['email'];
                                                $address = $_REQUEST['address'];
                                                $phone = $_REQUEST['phone'];
                                                $nic = $_REQUEST['nic'];
                                                $psaaword = $_REQUEST['pass'];
                                                $conpw = $_REQUEST['confpass'];

                                                $query2="SELECT * FROM customer WHERE email='$email'";
                                                $sql2=mysqli_query($con,$query2);

                                                $query3="SELECT * FROM customer WHERE phone='$phone'";
                                                $sql3=mysqli_query($con,$query3);

                                                $query4="SELECT * FROM customer WHERE nic='$nic'";
                                                $sql4=mysqli_query($con,$query4);

                                                if (empty($name)) {

                                                    echo "<script>alert(\"Plese Enter Your Name.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($email)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your Email.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($address)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your address.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($phone)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your Phone Number.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($nic)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter Your NIC Number.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($psaaword)) {
                                                    
                                                    echo "<script>alert(\"Plese Enter New Password.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (empty($conpw)) {
                                                    
                                                    echo "<script>alert(\"Plese confirm Your Password.\");window.location.href=\"register.php\";</script>";
                                                
                                                }
                                                elseif (!preg_match("/^([0]([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)) {

                                                    echo "<script>alert(\"Plese Enter Valid Phone Number.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif ($psaaword!=$conpw) {
                                                    
                                                    echo "<script>alert(\"Password is Not Match.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (mysqli_num_rows($sql2)>0) {
                                                
                                                    echo "<script>alert(\"Email already Exsisted.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                elseif (mysqli_num_rows($sql3)>0) {
                                                    
                                                    echo "<script>alert(\"Phone Number already Exsisted.\");window.location.href=\"register.php\";</script>";
                                                }
                                                elseif (mysqli_num_rows($sql4)>0) {
                                                
                                                    echo "<script>alert(\"NIC Number already Exsisted.\");window.location.href=\"register.php\";</script>";
                                                    
                                                }
                                                else {

                                                    $q1="INSERT INTO customer(name,phone,email,address,password,nic) values('$name','$phone','$email','$address','".md5($psaaword)."','$nic')";
                                                    $res1=mysqli_query($con,$q1);

                                                    if ( $res1){
                                                        echo "<script>alert(\"congratulations! your registration was successful.\");window.location.href=\"login.php\";</script>";
                                                    }
                                                    else{
                                                        echo "<script>alert(\"Ohh Snap! your registration Fail. Plese Try Again!.\");window.location.href=\"register.php\";</script>";
                                                    }
                                                }
                                            }

                                             ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Sineth Phamecy.Galle.2021. <br> Created By : L.A. Subashini Sewwandi SEU/IS/16/MIT/096/div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
