<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Category List</a></h1>
                                </div>
                                <div class="col-md-2">
                                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New</button>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                                    <div class="card">
                                        <div class="table-responsive">
                                            <table class="table v-middle text-center">
                                                <thead>
                                                    <tr class="bg-dark">
                                                        <th class="border-top-0 text-white">Categori Name</th>
                                                        <th class="border-top-0 text-white">Image</th>
                                                        <th class="border-top-0 text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php $count=1;
                                                  $getcat = "SELECT * FROM category";
                                                  $viewresult = mysqli_query($con, $getcat);
                                                    
                                                  ?>
                                                <tbody>
                                                    <?php while($row = mysqli_fetch_assoc($viewresult)) { 

                                                        $image = $row['cat_image'];
                                                        $image_src = "../upload/category/".$image;?>
                                                    <tr>
                                                        <td><h4><?php echo $row['cat_name']; ?></h4></td>
                                                        <td><img width="100px" src='<?php echo $image_src; ?>'></td>
                                                        <td>
                                                          <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                              <a class="dropdown-item" href="edit_cat.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                              <a class="dropdown-item" href="delete.php?cat_id=<?php echo $row['cat_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </div>
                                                          </div>
                                                        </td>
                                                    </tr>
                                                    <?php   $count++; } ?>
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
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Add New Category</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="name" class="a"><b>Category Name</b></label>
                        <input type="text" class="form-control" name="cat_name" placeholder="Category Name">
                      </div>
                    </div>

                    <br>
                      Select Category Front image to upload:<br>
                        <input type="file" name="file" /><br><br>
   

                  <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    <?php
                                    if(isset($_POST['submit'])){
                                      if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) { 
                                      $cat_name = $_REQUEST['cat_name'];
                                      $file = $_REQUEST['file'];

                                      $name = $_FILES['file']['name'];
                                      $target_dir = "../upload/category/";
                                      $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                      $extensions_arr = array("jpg","jpeg","png","gif");

                                              if(!empty($cat_name)){
                                                  $q4 = "SELECT * FROM category WHERE cat_name='$cat_name'";
                                                  $res4 = mysqli_query($con,$q4);

                                                  if(mysqli_num_rows($res4)>0)
                                                  {
                                                    echo '<script>alert("Product Categori Alrady Saved.");
                                                    </script>';
                                                  }
                                                  else{
                                                    if (in_array($imageFileType,$extensions_arr)) {

                                                            move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

                                                            $q1="INSERT INTO category(cat_name,cat_image) values('$cat_name','$name')";
                                                                  $res1=mysqli_query($con,$q1);
                                                                  if ( $res1)
                                                                  {

                                                                       echo '<script>alert("Product Category Save is Scussessfully.");window.location.href="cat.php"; </script>';
                                                                  }else{
                                                                    echo "<script>alert(\"Product Categori Save is Not Scussess\");</script>";
                                                                  }

                                                    }
                                                  }
                                              }else{ echo "<script>alert(\"Please Enter Product Categories\");</script>";}
                                      }else{ echo "<script>alert(\"Please Select Image\");</script>";}
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
