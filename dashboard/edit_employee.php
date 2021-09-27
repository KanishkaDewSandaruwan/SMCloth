<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Edit Employee</a></h1>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                                   <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="name"><b>Full Name</b></label>
                                              <input type="text" class="form-control" name="name" placeholder="Full Name">
                                            </div>
                                            </div>


                                            <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label><b>Email</b></label>
                                              <input type="text" class="form-control" name="email" placeholder="Email Address">
                                            </div>
                                          </div>

                                          
                                          <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="address"><b>Address</b></label>
                                            <input type="text" class="form-control"  name="address" placeholder="Address">
                                          </div>
                                          </div>

                                          <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="phone"><b>Phone Number</b></label>
                                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                                          </div>
                                          </div>

                                          <div class="form-row">
                                            <div class="form-group col-md-6">
                                              <label for="inputState"><b>Gender</b></label>
                                              <select id="inputState" name="gender" class="form-control">
                                                <option selected></option>
                                                <option>Male</option>
                                                <option>Female</option>
                                              </select>
                                            </div>
                                            </div>


                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" onclick="window.location.href='employee.php'" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>

                                        <?php
                                        if(isset($_POST['submit'])){
                                            $fname = $_REQUEST['name'];
                                            $emails = $_REQUEST['email'];
                                            $address = $_REQUEST['address'];
                                            $phone = $_REQUEST['phone'];
                                            $gender = $_REQUEST['gender'];

                                            $id = $_REQUEST['emp_id'];


                                            if(!empty($fname))
                                              {
                                                $query3="UPDATE employee SET full_name='$fname' WHERE emp_id='".$id."'";
                                                $sql3=mysqli_query($con,$query3);
                                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"employee.php\";</script>";
                                              }
                                              if(!empty($emails))
                                              {
                                                if(filter_var($emails, FILTER_VALIDATE_EMAIL)){

                                                  $query1="SELECT * FROM employee WHERE email='$emails'";
                                                  $sql1=mysqli_query($con,$query1);


                                                    if(mysqli_num_rows($sql1)>0)
                                                    {
                                                      echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                                                    }
                                                    else
                                                      {
                                                        $query3="UPDATE employee SET email='$emails' WHERE emp_id='".$id."'";
                                                        $sql3=mysqli_query($con,$query3);
                                                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='employee.php';</script>";
                                                      }
                                                }
                                              }
                                              if(!empty($address))
                                              {
                                                $query3="UPDATE employee SET address='$address' WHERE emp_id='".$id."'";
                                                $sql3=mysqli_query($con,$query3);
                                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"employee.php\";</script>";
                                              }
                                              if(!empty($phone))
                                              {
                                                if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                                    $query3="UPDATE employee SET phone_number='$phone' WHERE emp_id='".$id."'";
                                                    $sql3=mysqli_query($con,$query3);
                                                    echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"employee.php\";</script>";

                                                  }else{echo "Enter Valid Phone Number";}
                                              }
                                              if(!empty($gender))
                                              {
                                                $loginsql="SELECT * FROM employee WHERE emp_id='".$id."'";
                                                  $result=mysqli_query($con,$loginsql);
                                                  $rows=mysqli_fetch_assoc($result);
                                                  $a = $rows['gender'];

                                                  if($a==$gender)
                                                  {
                                                      echo "<script type=\"text/javascript\"> alert(\"Gender already Here\");</script>";
                                                    }else{ 
                                                      $query3="UPDATE employee SET gender='$gender' WHERE emp_id='".$id."'";
                                                      $sql3=mysqli_query($con,$query3);
                                                      echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"employee.php\";</script>";
                                                }
                                              }
                                        } ?>
                      </div>
                    </form>
                                </div>
                            </div>
                                            
                                        
                    </div>
                </main>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
