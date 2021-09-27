<?php require_once "inner_head.php"; ?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Payment</li>
        </ol>
        <h2>Payment</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
              <div class="row p-5">
                  <div class="col-md-8 text-left">
                        <?php   
                        $getEmail = $_SESSION['customer_id'];
                        $total = $_REQUEST['total'];
                        $viewquery = " SELECT * FROM cart where customer_id = '$getEmail'";
                        $viewresult = mysqli_query($con,$viewquery); ?>

                        <div class="form-row">
                          <div class="form-group col-md-6" style="margin-left: 2%;">
                            <label for="inputState"><b>Select  Payment Method</b></label>
                            <select id="inputState" name="payment" class="form-control" style="height: 50px;">
                              <option selected></option>
                              <option>COD</option>
                              <option>Card</option>
                              <option>Paypal</option>
                            </select>
                          </div>
                          </div>
                      </div>
                      <div class="col-md-4 p-1">
                        <div class="row mb-5"  style=" padding-left: 5%;">
                          <h1 style="color: black; text-transform: uppercase;"><b>Order Summery</b></h1>
                        </div>

                        <div class="row"  style="background-color: #f9f6f7; color: blue; padding-left: 5%;">
                          <h2>Total : Rs. <?php echo $total; ?></h2>
                        </div>

                        <div class="row mt-3 justify-content-center">
                              <button class="btn btn-primary col-sm-11 ml-1" name="" onclick="placeOrder();" type="submit" style=" padding: 3%;">PLACE ORDER</i></button>
                        </div>
                      </div>
                  </div>
                  </br>
                  <script type="text/javascript">
                    function placeOrder(){

                     var payment = document.getElementById('inputState').value;

                    if (payment == "COD"){
                        window.location.href='order.php?total=<?php echo $total; ?>';
                     }
                    }
                  </script>
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