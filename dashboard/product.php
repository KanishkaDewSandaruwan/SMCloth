<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Product List</a></h1>
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
                                                        <th class="border-top-0 text-white">Product Name</th>
                                                        <th class="border-top-0 text-white">Product Description</th>
                                                        <th class="border-top-0 text-white">Category</th>
                                                        <th class="border-top-0 text-white">Price</th>
                                                        <th class="border-top-0 text-white">Quntity</th>
                                                        <th class="border-top-0 text-white">Available</th>
                                                        <th class="border-top-0 text-white">Image</th>
                                                        <th class="border-top-0 text-white">Date</th>
                                                        <th class="border-top-0 text-white">Action</th>
                                                    </tr>
                                                </thead>
                                                <?php $count=1;
                                                  $getproduct = "SELECT * FROM product";
                                                  $viewresult1 = mysqli_query($con, $getproduct);
                                                    
                                                  ?>
                                                <tbody>
                                                    <?php while($row = mysqli_fetch_assoc($viewresult1)) { 
                                                        $cat_id = $row['cat_id'];
                                                        $getcat = "SELECT * FROM category where cat_id = '$cat_id' ";
                                                        $viewresult = mysqli_query($con, $getcat);
                                                        $row1 = mysqli_fetch_assoc($viewresult);

                                                        $image = $row['image'];
                                                        $image_src = "../upload/product/".$image;?>
                                                    <tr>
                                                        <td><h4><?php echo $row['product_name']; ?></h4></td>
                                                        <td><h4><?php echo $row['description']; ?></h4></td>
                                                        <td><h4><?php echo $row1['cat_name']; ?></h4></td>
                                                        <td><h4><?php echo $row['price']; ?></h4></td>
                                                        <td><h4><?php echo $row['qnt']; ?></h4></td>
                                                        <td><h4><?php echo $row['available']; ?></h4></td>
                                                        <td><img width="100px" src='<?php echo $image_src; ?>'></td>
                                                        <td><h4><?php echo $row['trndate']; ?></h4></td>
                                                        <td>
                                                          <div class="dropdown">
                                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                              Action
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                              <a class="dropdown-item" href="edit_product.php?product_id=<?php echo $row['product_id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                                                              <a class="dropdown-item" href="delete.php?product_id=<?php echo $row['product_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
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
                <h1 style="font-family: \"Times New Roman\",Times, serif; text-align:center" class ="text-danger text-center" >Add New Product</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-primary">Save changes</button>

                                    <?php
                                    if(isset($_POST['submit'])){

                                      if(isset($_FILES['file']) && !empty($_FILES['file']['name'])) { 
                                      
                                      $product_name = $_REQUEST['name'];
                                      $desc = $_REQUEST['desc'];
                                      $price = $_REQUEST['price'];
                                      $cat = $_REQUEST['cat'];
                                      $qty = $_REQUEST['qty'];
                                      $available = $_REQUEST['available'];

                                      $cdate = date("Y/m/d m:H:s");


                                      $file = $_REQUEST['file'];

                                      $name = $_FILES['file']['name'];
                                      $target_dir = "../upload/product/";
                                      $target_file = $target_dir . basename($_FILES["file"]["name"]);
                                      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                                      $extensions_arr = array("jpg","jpeg","png","gif");

                                              if(!empty($product_name)){
                                                if(!empty($desc)){
                                                  if(!empty($price)){
                                                    if(!empty($qty)){
                                                      if(!empty($cat)){
                                                        if(!empty($available)){
       
                                                            if (in_array($imageFileType,$extensions_arr)) {

                                                                    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

                                                                    $q1="INSERT INTO product(cat_id,product_name,description,price,qnt,image,trndate,available) values('$cat','$product_name','$desc','$price','$qty','$name','$cdate','$available')";
                                                                          $res1=mysqli_query($con,$q1);
                                                                          if ( $res1)
                                                                          {

                                                                               echo '<script>alert("Product Save is Scussessfully.");window.location.href="product.php"; </script>';
                                                                          }else{
                                                                            echo "<script>alert(\"Product Save is Not Scussess\");</script>";
                                                                          }

                                                            }
                                                  
                                                        }else{ echo "<script>alert(\"Please Select Availability\");</script>";}
                                                      }else{ echo "<script>alert(\"Please Select Product Category\");</script>";}
                                                    }else{ echo "<script>alert(\"Please Enter Product Quntity\");</script>";}
                                                  }else{ echo "<script>alert(\"Please Enter Product Price\");</script>";}
                                                }else{ echo "<script>alert(\"Please Enter Product Description\");</script>";}
                                              }else{ echo "<script>alert(\"Please Enter Product Name\");</script>";}
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
