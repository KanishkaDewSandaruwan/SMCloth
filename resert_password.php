<?php 
    require_once "connection.php";
    session_start();
 ?>
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
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Reset Password</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <input type="password" name="npass" id="userPassword" class="form-control input-sm chat-input" placeholder="New Password"/>
                                            </div>
                                          </div>
                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <input type="password" name="conpass" id="userPassword" class="form-control input-sm chat-input" placeholder="Confirm Password"/>
                                            </div>
                                                <button type="submit" name="submit" class="btn col-md-12  btn-primary btn-lg">Reset</button>
                                            </div>
                                        </form>

                                        <?php
                            if(isset($_POST['submit']))
                            {

                            $newpass=stripslashes($_REQUEST['npass']);
                            $confpass=stripslashes($_REQUEST['conpass']);
                            $g = $_REQUEST['id'];

                              if(!empty($newpass)){
                                if(!empty($confpass)){

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
                                          echo "<script type=\"text/javascript\"> alert(\"Password Update Successfull\"); window.location.href='login.php'; </script>"; 
                                      }

                                    }else{ echo "<script>alert(\"Password is Not Match\");</script>";}
                                }else{ echo "<script>alert(\"Enter Confirm Password\");</script>";} 
                              }else{ echo "<script>alert(\"Enter New Password\");</script>";} 

                            }
                        ?>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Have an account? Go to login!</a></div>
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
                            <div class="text-muted">Copyright &copy; SM Clothing.2021.</div>
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
