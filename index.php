<?php require_once "home_head.php"; ?>
  <!-- ======= Hero Section ======= -->

  <?php 
$home_query = "SELECT * FROM details";
$home_query_result = mysqli_query($con, $home_query);
$row = mysqli_fetch_assoc($home_query_result);
$bottom_banner_01 = $row['header_image'];
$image_src1 = "upload/home/".$bottom_banner_01; ?>


  <style type="text/css">
    #hero {
      width: 100%;
      height: calc(100vh - 110px);
      background: url("<?php echo $image_src1; ?>") top center;
      background-size: cover;
      position: relative;
    }
  </style>
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1><?php echo $row['header_title']; ?></h1>
      <h2><?php echo $row['header_desc']; ?></h2>
      <a href="#product" class="btn-get-started scrollto">Products</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    
    <!-- ======= Clients Project ======= -->
    <section id="product" class="clients">
      <div class="container-fluid p-5" data-aos="zoom-in">

        <div class="row d-flex align-items-center">
                <?php 
                      $prodcat="SELECT * FROM category";
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
                                   <div class="col-sm-12 col-md-4 col-lg-4 mt-5 border border-dark p-5">
                                <a class="lightbox">
                                  <img style="width: 100%; height: 300px" class="img-fluid" src="<?php echo $productimage_src; ?>"  alt="Gallery Images">
                                  <h4 class="text-dark mt-3"><?php echo $row3['product_name']; ?></h4>
                                  <p class="item-price text-dark"><?php echo $row3['description']; ?></p>
                                  <p class="item-price">Rs. <?php echo $row3['price']; ?></p>
                                  <a href="addtocat.php?product_id=<?php echo $row3['product_id']; ?>" class="btn btn-lg btn-dark">Add to Cart</a>
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
                    <?php } $counts++; } ?>
          
        </div>

      </div>
    </section><!-- End Product Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">
      <?php $viewquery = "SELECT * FROM about";
        $viewresult = mysqli_query($con,$viewquery);
        $row5 = mysqli_fetch_assoc($viewresult); 

        $about_image = $row5['image'];
        $image_src1 = "upload/home/".$about_image;
        ?>

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left">
            <img src="<?php echo $image_src1; ?>" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3><?php echo $row5['title']; ?></h3>
            <p class="fst-italic">
              <?php echo $row5['description']; ?>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Contact Section ======= -->
          <?php $viewquery = "SELECT * FROM about";
          $viewresult = mysqli_query($con,$viewquery);
          $row = mysqli_fetch_assoc($viewresult); ?>
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact</span>
          <h2>Contact</h2>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p><?php echo $row['address']; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p><?php echo $row['email']; ?></p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>+94 <?php echo $row['phone']; ?></p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">

          <div class="col-lg-6">
            <form action="" method="post" >
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-danger col-md-6 mt-3" name="submit">Send Message</button></div>
            </form>

            <?php 

              if(isset($_POST['submit'])){

                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $subject = $_REQUEST['subject'];
                    $message = $_REQUEST['message'];
                    $cdate = date("Y/m/d m:H:s");


                    if(!empty($name)){
                      if(!empty($email)){
                        if(!empty($subject)){
                          if(!empty($message)){

                                        

                                $q1="INSERT INTO message(name,email,subject,message,trn_date) values('$name','$email','$subject','$message','$cdate')";
                                      $res1=mysqli_query($con,$q1);
                                      if ( $res1) {

                                           echo '<script>alert("Massage Save Success.");
                                           window.location.href="index.php";</script>';
                                          
                                      }else{
                                        echo "<script>alert(\"Massege Sent not Success\");</script>";
                                      }
                                          
                                              
                                            

                            }else {echo "<script>alert(\"Enter Message\");</script>";}
                          }else {echo "<script>alert(\"Enter Subject\");</script>";}
                      }else{ echo "<script>alert(\"Enter Email\");</script>";}
                    }else{ echo "<script>alert(\"Enter Your Name\");</script>";} 
                }echo '</form></div>'; //Register Form Validation


             ?>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

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
      <div class="text-muted">Copyright &copy; SM Clothing.2021.</div>
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