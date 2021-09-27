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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form method="POST">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control py-4" name="email" id="inputEmailAddress" type="text" placeholder="Enter Email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="pass" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button type="submit" name="submit" class="btn col-md-12  btn-primary btn-lg">Login</button>
                                            </div>
                                        </form>

                                        <?php if(isset($_POST['submit'])) {

                                                $email = stripslashes($_REQUEST['email']);
                                                $password = stripslashes($_REQUEST['pass']);

                                                $signin = "SELECT * FROM customer WHERE email ='$email' AND password ='".md5($password)."'";
                                                $result3 = mysqli_query($con,$signin) or mysqli_errno();
                                                $rows4 = mysqli_num_rows($result3);
                                                
                                                if($rows4==1){
                                                    if ($row1 = mysqli_fetch_assoc($result3)) {

                                                        $id = $row1['customer_id'];
                                                        $_SESSION['customer_id']=$id;
                                                        echo "<script type=\"text/javascript\">window.location.href='index.php'; </script>";
                                                    }
                                                }
                                                else{

                                                    echo "<script>alert(\"Username or Password is incorrect.\");window.location.href=\"login.php\";</script>";
                                                }
                                            } ?>
                                    </div>
                                        <div class="small ml-2"><a href="rest.php">Reset Password!</a></div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
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
