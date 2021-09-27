<?php require_once "home_head.php"; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Inner Page</li>
        </ol>
        <h2>Inner Page</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <?php 

                    if (isset($_REQUEST['cat_id'])) {
                        $id = $_REQUEST['cat_id'];

                      $prodcat="SELECT * FROM category where cat_id = '$id'";
                      $query2 = mysqli_query($con,$prodcat); 
                      $counts = 0;
                      while ($row2 = mysqli_fetch_assoc($query2)) { 
                        $id = $row2['cat_id'];
                        $food1="SELECT * FROM product where cat_id='".$id."'";
                        $query3 = mysqli_query($con,$food1); 
                        if (mysqli_fetch_assoc($query3)) {
                        ?>

                      <div class="gallery-box mt-5">
                        <div class="container-fluid">
                          <div class="row">
                            <div class="col-lg-12">
                              <!-- <div class="heading-title text-center"> -->
                                <h2 style="font-size: 50px; text-align: left; color: black; text-transform: uppercase; font-weight: bold;"><?php echo $row2['cat_name']; ?></h2>
                                <hr>
                              <!-- </div> -->
                            </div>
                          </div>
                          <div class="tz-gallery">
                            <div class="row">
                              <?php 
                                $food="SELECT * FROM product where cat_id='".$id."'";
                                $query1 = mysqli_query($con,$food); 
                                $count = 0;
                                while ($row3 = mysqli_fetch_assoc($query1)) { 
                                $productimage = $row3['image'];
                                $productimage_src = "upload/product/".$productimage; 


                                if ($row3['available'] == "Yes") {
                                if ($count < 6) { 
                                  ?>
                                  <div class="col-sm-12 col-md-4 col-lg-4 mt-5">
                                <a class="lightbox">
                                  <img style="width: 100%; height: 300px" class="img-fluid" src="<?php echo $productimage_src; ?>"  alt="Gallery Images">
                                  <h4><?php echo $row3['product_name']; ?></h4>
                                  <p class="item-price"><?php echo $row3['description']; ?></p>
                                  <p class="item-price">Rs. <?php echo $row3['price']; ?></p>
                                  <a href="addtocat.php?product_id=<?php echo $row3['product_id']; ?>" class="btn btn-primary">Add to Cart</a>
                                </a>
                              </div>
                    
                              <?php  }else{ ?> 
                                <div class="row">
                                  <div class="col-md-12 ml-5 mt-5">
                                    <a class="" href="more.php"><h1>More food .... Go to Menu</h1></a>
                                  </div>
                                </div>
                                
                                <?php }  $count++; } } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } $counts++; }  ?>

                 <?php }elseif (isset($_REQUEST['product_id'])) {

                    $id = $_REQUEST['product_id'];

                        $product1="SELECT * FROM product where product_id='".$id."'";
                        $query3 = mysqli_query($con,$product1); 
                        if (mysqli_fetch_assoc($query3)) {
                        ?>

                      <div class="gallery-box mt-5">
                        <div class="container-fluid">
                          <div class="tz-gallery">
                            <div class="row">
                              <?php 
                                $food="SELECT * FROM product where product_id='".$id."'";
                                $query1 = mysqli_query($con,$food); 
                                $count = 0;
                                while ($row3 = mysqli_fetch_assoc($query1)) { 
                                $foodimage = $row3['image'];
                                $foodimage_src = "upload/product/".$foodimage; 


                                if ($row3['available'] == "Yes") { ?>
                                  <div class="col-sm-12 col-md-4 col-lg-4 mt-5 border border-dark p-5">
                                <a class="lightbox">
                                  <img style="width: 100%; height: 300px" class="img-fluid" src="<?php echo $foodimage_src; ?>"  alt="Gallery Images">
                                  <h4 class="text-dark"><?php echo $row3['product_name']; ?></h4>
                                  <p class="item-price text-dark"><?php echo $row3['description']; ?></p>
                                  <p class="item-price">Rs. <?php echo $row3['price']; ?></p>
                                  <a href="addtocat.php?product_id=<?php echo $row3['product_id']; ?>" class="btn btn-lg btn-dark">Add to Cart</a>
                                </a>
                              </div>
                    
                                <?php $count++; } } ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php }else{ ?>
                      <h1>No Any Product Available</h1>
                    <?php }  }else{ 

                      $product1="SELECT * FROM product";
                        $query3 = mysqli_query($con,$product1); 
                        if (mysqli_fetch_assoc($query3)) {
                        ?>

                      <div class="gallery-box mt-5">
                        <div class="container-fluid">
                          <div class="tz-gallery">
                            <div class="row">
                              <?php 
                                $food="SELECT * FROM product ";
                                $query1 = mysqli_query($con,$food); 
                                $count = 0;
                                while ($row3 = mysqli_fetch_assoc($query1)) { 
                                $foodimage = $row3['image'];
                                $foodimage_src = "upload/product/".$foodimage; 


                                if ($row3['available'] == "Yes") { ?>
                                  <div class="col-sm-12 col-md-4 col-lg-4 mt-5 border border-dark p-5">
                                <a class="lightbox">
                                  <img style="width: 100%; height: 300px" class="img-fluid" src="<?php echo $foodimage_src; ?>"  alt="Gallery Images">
                                  <h4 class="text-dark"><?php echo $row3['product_name']; ?></h4>
                                  <p class="item-price text-dark"><?php echo $row3['description']; ?></p>
                                  <p class="item-price">Rs. <?php echo $row3['price']; ?></p>
                                  <a href="addtocat.php?product_id=<?php echo $row3['product_id']; ?>" class="btn btn-lg btn-dark">Add to Cart</a>
                                </a>
                              </div>
                    
                                <?php $count++; } } ?>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php } } ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-12 col-md-6">
            <div class="footer-info">
              <h3>SM Clothing</h3>
              <p><?php echo $row['address']; ?><br>
                <strong>Phone:</strong> +94 <?php echo $row['phone']; ?><br>
                <strong>Email:</strong> <?php echo $row['email']; ?><br>
              </p>
              <div class="social-links mt-3">
                <a href="<?php echo $row['facebook']; ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="<?php echo $row['twiter']; ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="<?php echo $row['instragram']; ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

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