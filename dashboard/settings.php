<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger ml-3" href="books.php">Home Page Settings</a></h1>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                              <div class="row">
                                <div class="col-md-3">
                                    <button style="font-size: 20px;" data-toggle="modal" data-target="#changeHeader" class="btn col-md-12 btn-lg btn-dark mt-3 ml-3">Change Home Page Header</button>
                                </div> 

                                <div class="col-md-3">
                                    <button style="font-size: 20px;" data-toggle="modal" data-target="#changeDetails" class="btn col-md-12 btn-lg btn-dark mt-3 ml-3">Change About Details</button>
                                </div> 

                                <div class="col-md-3">
                                    <button style="font-size: 20px;" data-toggle="modal" data-target="#changeContact" class="btn col-md-12 btn-lg btn-dark mt-3 ml-3">Change Contact Details</button>
                                </div> 
                            </div> 
                            <div class="row">

                            </div> 
                          </div>
                        </div>
                                            
                                        
                    </div>
                </main>

                <!-- Modal -->
      <div class="modal fade" id="changeContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Change Contact Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                        <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Email Address</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Phone Number</b></label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Address</b></label>
                        <input type="text" class="form-control" name="address" placeholder="Address">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Facebook</b></label>
                        <input type="text" class="form-control" name="fb" placeholder="Facebook">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Twitter</b></label>
                        <input type="text" class="form-control" name="twit" placeholder="Twitter">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-12">
                        <label for="name" class="a"><b>Instragram</b></label>
                        <input type="text" class="form-control" name="insta" placeholder="Instragram">
                      </div>
                    </div>


                                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="about" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                <?php
                   if(isset($_POST['about'])){
 

                      $email = $_REQUEST['email'];
                      $phone = $_REQUEST['phone'];
                      $address = $_REQUEST['address'];

                      $fb = $_REQUEST['fb'];
                      $twit = $_REQUEST['twit'];
                      $insta = $_REQUEST['insta'];


                      if(!empty($email))
                      {
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                          $query1="SELECT * FROM employee WHERE email='$email'";
                          $sql1=mysqli_query($con,$query1);


                            if(mysqli_num_rows($sql1)>0)
                            {
                              echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                            }
                            else
                              {
                                $query3="UPDATE about SET email='$email'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='settings.php';</script>";
                              }
                        }
                      }
                      if(!empty($address))
                      {
                        $query3="UPDATE about SET address='$address'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                      if(!empty($phone))
                      {
                        if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                            $query3="UPDATE about SET phone='$phone'";
                            $sql3=mysqli_query($con,$query3);
                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";

                          }else{echo "Enter Valid Phone Number";}
                      }

                      if(!empty($fb))
                      {
                        $query3="UPDATE about SET facebook='$fb'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }

                      if(!empty($twit))
                      {
                        $query3="UPDATE about SET twiter='$twit'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }

                      if(!empty($insta))
                      {
                        $query3="UPDATE about SET instragram='$insta'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                    }
                    
                  ?>
                    
            </div>
          </div>
        </div>

                 <!-- Modal -->
      <div class="modal fade" id="changeHeader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Change Home Page Images</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                         Select Header image to upload:<br>
                        <input type="file" name="file" /><br><br>

                        <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a"><b>Title</b></label>
                        <input type="text" class="form-control" name="title" placeholder="Title">
                      </div>
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a"><b>Description</b></label>
                        <input type="text" class="form-control" name="desc" placeholder="Description">
                      </div>
                    </div>

                                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="image_set_home" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                <?php
                   if(isset($_POST['image_set_home'])){
 
                      $name = $_FILES['file']['name'];

                      $title = $_REQUEST['title'];
                    $desc = $_REQUEST['desc'];


                      // $target_dir = "upload/";
                      $target_dir = "../upload/home/";
                      $target_file = $target_dir . basename($_FILES["file"]["name"]);


                      // Select file type
                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                      // Valid file extensions
                      $extensions_arr = array("jpg","jpeg","png","gif");

                      // Check extension
                      if( in_array($imageFileType,$extensions_arr) ){
                          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                          $query="UPDATE details SET header_image='$name'";
                          mysqli_query($con,$query);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }


                      if(!empty($title))
                      {

                        $query3="UPDATE details SET header_title='$title'";
                        $sql3=mysqli_query($con,$query3);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }
                      if(!empty($desc))
                      {

                        $query3="UPDATE details SET header_desc='$desc'";
                        $sql3=mysqli_query($con,$query3);
                          echo '<script>alert("Header Details Change Success"); window.location.href="settings.php";</script>';
                      }
                    }
                    
                  ?>
                    
            </div>
          </div>
        </div>

        <!-- Modal -->
      <div class="modal fade" id="changeDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title text-danger" id="exampleModalLabel">Change Railway Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="col-md-12 mt-3" method="POST" enctype="multipart/form-data">
                  <div class="modal-body">

                         Select Header image to upload:<br>
                        <input type="file" name="file" /><br><br>

                        <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="title" class="a"><b>About Title</b></label><br>
                        <input type="text" class="form-control" name="title" placeholder="About Title">
                      </div>
                    </div>

                     <label for="title" class="a"><b>About Description</b></label><br><br>
                    <textarea id="summernote" name="editordata"></textarea>
                        <script>
                          $('#summernote').summernote({
                            placeholder: 'Details About this Package',
                            tabsize: 2,
                            height: 120,
                            toolbar: [
                              ['style', ['style']],
                              ['font', ['bold', 'underline', 'clear']],
                              ['color', ['color']],
                              ['para', ['ul', 'ol', 'paragraph']],
                            ]
                          });
                        </script><br><br>
                                
                  </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="image_set" class="btn btn-primary">Save changes</button>
              </div>
                </form>
                <?php
                   if(isset($_POST['image_set'])){
 
                      $name = $_FILES['file']['name'];

                      $title = $_REQUEST['title'];
                      $desc = $_REQUEST['editordata'];


                      // $target_dir = "upload/";
                      $target_dir = "../upload/home/";
                      $target_file = $target_dir . basename($_FILES["file"]["name"]);


                      // Select file type
                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                      // Valid file extensions
                      $extensions_arr = array("jpg","jpeg","png","gif");

                      // Check extension
                      if( in_array($imageFileType,$extensions_arr) ){
                          move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                          $query="UPDATE about SET image='$name'";
                          mysqli_query($con,$query);
                          echo '<script>alert("Updated Succussfully"); window.location.href="settings.php";</script>';
                      }

                      if(!empty($title))
                      {

                        $query3="UPDATE about SET title='$title'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                      if(!empty($desc))
                      {

                        $query3="UPDATE about SET description='$desc'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"settings.php\";</script>";
                      }
                    }
                    
                  ?>
                    
            </div>
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
