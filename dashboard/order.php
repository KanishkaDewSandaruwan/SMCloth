<?php require_once 'head.php'; ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <div class="row mt-5">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-10">
                                  <h1 class="text-danger" style="font-family: \"Times New Roman\",Times, serif;"><a style="text-decoration:none;" class="text-danger" href="books.php">Orders</a></h1>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="row mt-1  ">
                                 <?php   
                                        
                                        $viewquery = " SELECT * FROM getorder";
                                        $viewresult = mysqli_query($con,$viewquery);

                                        

                                 ?>
                              
                                  <?php 
                                        while($row1 = mysqli_fetch_assoc($viewresult)) { ?>

                                        <div class="row" style="padding: 2%;  margin: 1%; color: #00394e; background-color: #f9f6f7">

                                          <div class="dropdown-divider"></div>
                                          <div class="col-sm-6 justify-content-left mt-5">
                                            <?php   
                                              $dlist = $row1['products'];

                                               $stri = explode(',', $dlist);
                                               $count = 0;
                                               // $arrlength=strlen($stri);


                                            foreach ($stri as $s){

                                                $getDetail_Query = "SELECT * FROM product where product_id ='".$s."' ";
                                                $getResult = mysqli_query($con,$getDetail_Query);

                                                $getDetail_Query1 = "SELECT * FROM product_backup where product_id ='".$s."' ";
                                                $getResult1 = mysqli_query($con,$getDetail_Query1);

                                                if($row4 = mysqli_fetch_assoc($getResult)){ 
                                                $image = $row4['image'];
                                                $image_src = "../upload/product/".$image;

                                                ?>
                                                <div class="row">
                                                  <div class="col-md-6 mt-3">
                                                    <img width="100%" src="<?php echo $image_src; ?>" >
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><?php echo $row4['product_name']; ?></p>
                                                  </div>
                                                </div>

                                              <?php }else if($row5 = mysqli_fetch_assoc($getResult1)){
                                                $image = $row5['image'];
                                                $image_src = "../upload/product/".$image;

                                                ?>
                                                <div class="row">
                                                  <div class="col-md-6 mt-3">
                                                    <img width="100%" src="<?php echo $image_src; ?>" >
                                                  </div>
                                                  <div class="col-md-6">
                                                    <p><?php echo $row5['product_name']; ?></p>
                                                  </div>
                                                  
                                                </div>
                                              <?php } ?>
                                                 
                                            <?php   $count++; }?>
                                          </div>
                                          <div class="col-sm-4 mt-5">
                                            <p>Rs. <?php echo $row1['total']; ?></p>
                                            <p><?php echo $row1['payment_type']; ?></p>
                                            <p><?php echo $row1['address']; ?></p>  
                                            <p><?php echo $row1['status']; ?></p>
                                            <p><?php echo $row1['trn_date']; ?></p>
                                          </div>
                                          <div class="col-sm-1 mt-5">
                                           <div class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                  
                                                  <a class="dropdown-item" href="orderchange.php?accept=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Accept</a>
                                                  <a class="dropdown-item" href="orderchange.php?shiped=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Shipped</a>
                                                  <a class="dropdown-item" href="orderchange.php?diliverd=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Diliverd</a>
                                                  <a class="dropdown-item" href="orderchange.php?paided=<?php echo $row1['order_id']; ?>"><i class="fas fa-edit"></i> Paid</a>
                                                  <a class="dropdown-item" href="orderchange.php?reject=<?php echo $row1['order_id']; ?>"><i class="fas fa-trash-alt"></i> Reject</a>
                                                  <a class="dropdown-item" href="orderchange.php?deletecomplete=<?php echo $row1['order_id']; ?>"><i class="fas fa-trash-alt"></i> Delete</a>
                                                </div>
                                              </div>

                                        </div>
                                        </div>
                                        
                                        <?php  $count++;
                                          
                                        
                                      }
                                   ?>
                                        
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
