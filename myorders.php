<?php require_once 'inner_head.php';
require_once "user.php";?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>My Orders</li>
        </ol>
        <h2>My Orders</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container-fluid">
          <div class="row  ml-3 ">
  <div class="col-md-7 border border-round">
    <?php   
                  $getID = $_SESSION['customer_id'];
                  $count = 0;

                  $viewquerys = " SELECT * FROM customer where customer_id = '".$getID."'";
                  $viewresults = mysqli_query($con,$viewquerys);
                  $row3 = mysqli_fetch_assoc($viewresults);
                  $pid = $row3['customer_id'];
                  
                  $viewquery = " SELECT * FROM getorder where customer_id='".$pid."'";
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
                          $image_src = "upload/product/".$image;

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
                          $image_src = "upload/product/".$image;

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
                          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="cancelOrder.php?order_id=<?php echo $row1['order_id']; ?>">Cancel Order</a></li>
                          </ul>
                        </div>

                  </div>
                  
                  <?php  $count++;
                    
                  
                }
             ?>

  </div>
</div>
    </div>
  </section>
    <div class="container">
      <div class="copyright">
        2121 &copy; Copyright <strong><span>Sineth Phamecy.Galle </span></strong>. All Rights Reserved.. <br> Created By : L.A. Subashini Sewwandi SEU/IS/16/MIT/096
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>