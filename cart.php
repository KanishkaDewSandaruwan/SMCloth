<?php require_once "inner_head.php"; 
require_once "user.php";?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Cart</li>
        </ol>
        <h2>Cart</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <div class="row">
          
          <div class="col-md-8">
          <?php
              $cid = $_SESSION['customer_id'];
              $carts="SELECT * FROM cart where customer_id='".$cid."'";
              $carts1 = mysqli_query($con,$carts); 
              $total = 0;

              while ($row = mysqli_fetch_assoc($carts1)) { 
              $id = $row['product_id'];

                $product="SELECT * FROM product where product_id ='".$id."'";
                $query1 = mysqli_query($con,$product); 
                if($row1 = mysqli_fetch_assoc($query1)){

                $total = $total + $row['price'];

                  $productimage = $row1['image'];
                  $productimage_src = "upload/product/".$productimage; ?>
                <div class="row mt-5 mb-5">
                  <div class="col-md-3">
                    <img style="width: 100%;" class="img-fluid" src="<?php echo $productimage_src; ?>"  alt="Gallery Images">
                  </div>
                  <div class="col-md-3 p-5">
                    <h4><?php echo $row1['product_name']; ?></h4>
                  </div>
                  <div class="col-md-2 p-5">
                    <h4><?php echo $row['price']; ?></h4>
                  </div>
                  <div class="col-md-2 p-5">
                    <a href="removecart.php?cart_id=<?php echo $row['cart_id']; ?>"><h4><i style="font-size: 30px" class="fas fa-times"></i></h4></a>
                  </div>
                </div>
    <?php } }?>
        </div>


        <?php $carts="SELECT * FROM cart where customer_id='".$cid."'";
        $carts1 = mysqli_query($con,$carts); 
        if ($row = mysqli_fetch_assoc($carts1)) {  ?>


              <div class="col-md-4 p-5" style="background-color: #f9f6f7; padding-left: 5%;">
                    <h3 style="color: green">Your Payment Summery</h3><br>
                    <div class="row"  style="background-color: #f9f6f7; color: black; padding-left: 5%;">
                        <div class="col-sm-8">
                            <p>Subtotal </p>
                        </div>
                        <div class="col-sm-4">
                            <p>Rs. <?php echo $total; ?> </p>
                        </div>
                    </div>
                    <div class="row mt-2"  style="background-color: #f9f6f7; color: red; padding-left: 5%;">
                      <h2>Total : Rs. <?php echo $total; ?></h2>
                    </div>
                    <div class="row mt-3 justify-content-center">
                          <button class="btn btn-primary col-sm-11 ml-1" onclick="redirectUser()" type="button" style="padding: 4%;">
                          PROCEED TO CHECKOUT</i></button>
                    </div>
              </div>
      <?php }else{ ?>
        <div class="row p-5">
          <h1 style="color: green;">Empty Cart</h1>
        </div>
      <?php } ?>
    <?php  ?> 
        </div>
      </div>
      </div>
    </section>

  </main><!-- End #main -->
<?php $viewquery = "SELECT * FROM about";
    $viewresult = mysqli_query($con,$viewquery);
    $row = mysqli_fetch_assoc($viewresult); ?>
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
          <script type="text/javascript">
      function redirectUser(){

          window.location.href='makeOrder.php?total=<?php echo $total; ?>';

        }
    </script>


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