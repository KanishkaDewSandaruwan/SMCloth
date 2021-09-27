<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Employee List</a></h1>
                                </div>
                                <div class="col-md-2">
                                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table v-middle text-center">
                                                <thead>
                                                    <tr class="bg-dark">
                                                        <th class="border-top-0 text-white">Employee First Name</th>
                                                        <th class="border-top-0 text-white">Address</th>
                                                        <th class="border-top-0 text-white">Phone Number</th>
                                                        <th class="border-top-0 text-white">Email</th>
                                                        <th class="border-top-0 text-white">Gender</th>
                                                        <th class="border-top-0 text-white">User Name</th>
                                                        <th class="border-top-0 text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php $count=1;
                                                  $getproduct = "SELECT * FROM employee";
                                                  $viewresult1 = mysqli_query($con, $getproduct);?>
                                                <tbody>
                                                    <?php while($row = mysqli_fetch_assoc($viewresult1)) { 
                                                        if ($row['username'] != 'admin') { ?>
                                                    <tr>
                                                        <td><h4><?php echo $row['full_name']; ?></h4></td>
                                                        <td><h4><?php echo $row['address']; ?></h4></td>
                                                        <td><h4><?php echo $row['phone_number']; ?></h4></td>
                                                        <td><h4><?php echo $row['email']; ?></h4></td>
                                                        <td><h4><?php echo $row['gender']; ?></h4></td>
                                                        <td><h4><?php echo $row['username']; ?></h4></td>
                                                        <td>
                                                          <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                              <a class="dropdown-item" href="edit_employee.php?emp_id=<?php echo $row['emp_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                              <a class="dropdown-item" href="delete.php?emp_id=<?php echo $row['emp_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <?php }  $count++; } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            
                                        
                    </div>
                </main>
                <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Add New Categori</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label for="name" class="a"><b>Full Name</b></label>
                                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                                      </div>
                                    </div>

                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                        <label><b>Email</b></label>
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                      </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-6">
                                      <label for="address"><b>Address</b></label>
                                      <input type="text" class="form-control"  name="address" placeholder="Address">
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-md-6">
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

                                      <div class="form-row">
                                       <div class="form-group col-md-6">
                                      <label for="phone"><b>Usename</b></label>
                                      <input type="text" style="text-transform: uppercase;" class="form-control" name="uname" placeholder="Password">
                                    </div>
                                    </div>

                                    <div class="form-row">
                                      <div class="form-group col-md-6">
                                      <label for="phone"><b>Password</b></label>
                                      <input type="password" class="form-control" name="pass" placeholder="Password">
                                    </div>
                                    </div>

                                    <div class="form-row">
                                    <div class="form-group col-lg-6">
                                      <label for="phone"><b>Confirm Password</b></label>
                                      <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password">
                                    </div>
                                    </div>
   

                              <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>

                                     <?php
                                    if(isset($_POST['submit'])){
                                      $fname = $_REQUEST['name'];
                                      $emails = $_REQUEST['email'];
                                      $address = $_REQUEST['address'];
                                      $phone = $_REQUEST['phone'];
                                      $gender = $_REQUEST['gender'];
                                      $uname = $_REQUEST['uname'];
                                      $pass = $_REQUEST['pass'];
                                      $conf_pass = $_REQUEST['conf_pass'];
                                      $cdate = date("Y/m/d m:H:s");


                                      if(!empty($fname)){
                                        if(!empty($emails)){
                                          if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                                            if(!empty($address)){
                                              if(!empty($phone)){
                                              if(!empty($gender)){
                                                if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                                  if(!empty($gender)){
                                                    if(!empty($uname)){
                                                          if(!empty($pass)){
                                                            if(!empty($conf_pass)){
                                                              if($pass==$conf_pass){
                                                                  $query2="SELECT * FROM employee WHERE email='$emails'";
                                                                      $sql2=mysqli_query($con,$query2);

                                                                      if(mysqli_num_rows($sql2)>0){
                                                                          echo "<script>alert(\"Email already Exsisted\");</script>";
                                                                      }else{
                                                                          $query3="SELECT * FROM employee WHERE username='$uname'";
                                                                          $sql3=mysqli_query($con,$query3);

                                                                          if(mysqli_num_rows($sql3)>0){
                                                                              echo "<script>alert(\"Username already Exsisted\");</script>";
                                                                          }else{
                                                                                $query3="SELECT * FROM customer WHERE email='$emails'";
                                                                                $sql3=mysqli_query($con,$query3);

                                                                                if(mysqli_num_rows($sql3)>0){
                                                                                    echo "<script>alert(\"Email already Exsisted\");</script>";
                                                                                }else{
                                                                                      $q1="INSERT INTO employee(full_name,address,phone_number,email,gender,password,username,trndate) values('$fname','$address','$phone','$emails','$gender','".md5($pass)."','$uname','$cdate')";
                                                                                            $res1=mysqli_query($con,$q1);
                                                                                            if ( $res1) {

                                                                                                 echo '<script>alert("Employee Registration is Scussessfully."); window.location.href="employee.php";
                                                                                                              </script>';
                                                                                                
                                                                                            }else{
                                                                                              echo "<script>alert(\"Employee Registration is Not Scussess\");</script>";
                                                                                            }
                                                                                      }
                                                                                }
                                                                            }
                                                              }else{echo "<script>alert(\"Password is Not Match\");</script>";}
                                                            }else{ echo "<script>alert(\"Enter Confirm Password\");</script>";}
                                                          }else{ echo "<script>alert(\"Enter Password\");</script>";}
                                                    }else{ echo "<script>alert(\"Enter Username\");</script>";}
                                                  }else{ echo "<script>alert(\"Select Gender\");</script>";}
                                                }else {echo "<script>alert(\"Enter Valid Phone Number\");</script>";}
                                                }else {echo "<script>alert(\"Select Your Gender\");</script>";}
                                              }else{ echo "<script>alert(\"Enter Phone Number\");</script>";}
                                            }else{ echo "<script>alert(\"Enter Address\");</script>";}
                                          }else {echo "<script>alert(\"Enter Valid Email Address\");</script>";}
                                        }else{ echo "<script>alert(\"Enter Email\");</script>";}
                                      }else{ echo "<script>alert(\"Enter Full Name\");</script>";} 
                                  } ?>
                  </div>
                </form>
              </div>
            </div>
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
