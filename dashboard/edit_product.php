<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Edit Product</a></h1>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6 mt-4" style="font-family: \"Times New Roman\",Times, serif;">
                                   <form class="reg_form bg-light p-4 border rounded" action="" method="POST" enctype="multipart/form-data">

                                        <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="code" class="a"><b>Product Name</b></label>
                                            <input type="text" class="form-control" name="name" placeholder="Product Name">
                                          </div>
                                        </div>


                                        <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="title" class="a"><b>Description</b></label>
                                            <input type="text" class="form-control" name="desc" placeholder="Description">
                                          </div>
                                        </div>

                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="desc"><b>Product Price </b></label>
                                          <input type="text" class="form-control" name="price" placeholder="Product Price ">
                                        </div>
                                        </div>

                                          <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="inputState"><b>Categories</b></label>
                                            <select id="inputState" name="cat" class="form-control">
                                            <option selected></option>
                                            <?php 
                                              $q3 = "SELECT * FROM category";
                                                $res3 = mysqli_query($con,$q3);
                                                $c=1;
                                                while($row=mysqli_fetch_assoc($res3)){
                                                  $id = $row['cat_id'];
                                                  echo "<option value='$id'>".$row['cat_name']."</option>";
                                                  $c++;
                                                }
                                             ?>
                                            </select>
                                          </div>
                                          </div>

                                          <div class="dropdown-divider" style="color:red;"></div>

                                        <div class="form-row">
                                        <div class="form-group col-md-12">
                                          <label for="original_price"><b>Quntity</b></label>
                                          <input type="text" class="form-control"  name="qty" placeholder="Quntity">
                                        </div>
                                        </div>

                                        <br>
                                        Select Foods Front image to upload:<br>
                                          <input type="file" name="file" /><br><br>

                                          <div class="form-row">
                                            <div class="form-group col-md-12">
                                              <label for="inputState"><b>Availability</b></label>
                                              <select id="inputState" name="available" class="form-control">
                                                <option selected></option>
                                                <option>Yes</option>
                                                <option>No</option>
                                              </select>
                                            </div>
                                            </div>


                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-dark" onclick="window.location.href='product.php'" data-bs-dismiss="modal">Back</button>
                                    <button type="submit" name="submit" class="btn btn-primary">Save changes</button>

                                        <?php
                                        if(isset($_POST['submit'])){

                                          
                                          $product_name = $_REQUEST['name'];
                                          $desc = $_REQUEST['desc'];
                                          $price = $_REQUEST['price'];
                                          $cat = $_REQUEST['cat'];
                                          $qty = $_REQUEST['qty'];
                                          $available = $_REQUEST['available'];

                                          $id = $_REQUEST['product_id'];

                                          $cdate = date("Y/m/d m:H:s");


                                          $file = $_REQUEST['file'];
                                          $name = $_FILES['file']['name'];
                                          $target_dir = "../upload/product/";
                                          $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                          $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                          $extensions_arr = array("jpg","jpeg","png","gif");


                                          if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) { 
                                            if( in_array($imageFileType,$extensions_arr) ){
                                                move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);
                                                $query="UPDATE product SET image='$name' where product_id='".$id."'";
                                                mysqli_query($con,$query);
                                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                            }
                                          }

                                          if(!empty($product_name))
                                          {
                                            $query3="UPDATE product SET product_name='$product_name' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($cat))
                                          {
                                            $query3="UPDATE product SET cat_id='$cat' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($desc))
                                          {
                                            $query3="UPDATE product SET description='$desc' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($price))
                                          {
                                            $query3="UPDATE product SET price='$price' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }

                                          if(!empty($qty))
                                          {
                                            $query3="UPDATE product SET qnt='$qty' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
                                          }
                                          if(!empty($available))
                                          {
                                            $query3="UPDATE product SET available='$available' WHERE product_id='".$id."'";
                                            $sql3=mysqli_query($con,$query3);
                                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"product.php\";</script>";
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
