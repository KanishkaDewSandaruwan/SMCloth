<?php require_once 'inner_head.php';
require_once "user.php";?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>My Medication</li>
        </ol>
        <h2>My Medication</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container-fluid">
          <div class="row  ml-3 ">
  <div class="col-md-12 border border-round">
              <?php   
                  $getID = $_SESSION['customer_id'];
                  $count = 0;

                  $viewquerys = " SELECT * FROM customer where customer_id = '".$getID."'";
                  $viewresults = mysqli_query($con,$viewquerys);
                  $row3 = mysqli_fetch_assoc($viewresults);
                  $pid = $row3['customer_id'];
                  
                  $viewquery = " SELECT * FROM medication where customer_id='".$pid."'";
                  $viewresult = mysqli_query($con,$viewquery);

                  while($row1 = mysqli_fetch_assoc($viewresult)) { 

                    $image = $row1['medication'];
                    $image_src = "upload/medication/".$image;
                    $target_file = "upload/medication/".$image;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $extensions_arr = array("jpg","jpeg","png","gif");?>

                  <div class="row" style="padding: 2%;  margin: 1%; color: #00394e; background-color: #f9f6f7">

                    <div class="dropdown-divider"></div>
                    <div class="col-sm-6 justify-content-left mt-5">
                          <div class="row">
                            <div class="col-md-6 mt-3">
                              <?php if (in_array($imageFileType,$extensions_arr)) {?>
                                <img width="100%" src="<?php echo $image_src; ?>" >
                              <?php }else{ ?>
                                <p><?php echo $row1['medication']; ?></p>
                              <?php } ?>
                            </div>
                            <div class="col-md-6">
                              <p><?php echo $row3['name']; ?></p>
                              <p><?php echo $row3['email']; ?></p>
                              <p><?php echo $row3['phone']; ?></p>
                              <p><?php echo $row3['address']; ?></p>
                            </div>
                          </div>  
                    </div>
                    <div class="col-sm-4 mt-5">
                      <p class="text-danger"><?php if ($row1['price'] != 'Pending') { ?>
                        Your Medication Amount : Rs. 
                       <?php echo $row1['price'];} ?></p>
                      <p>Status : <?php echo $row1['status']; ?></p>
                      <p>Payment : <?php echo $row1['payment']; ?></p>
                      <p>Date : <?php echo $row1['trn_date']; ?></p>  
                    </div>
                    <div class="col-sm-1 mt-5">
                     <div class="dropdown">
                          <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <?php if ($row1['price'] != 'Pending') { ?>
                            <li><a class="dropdown-item" href="pay.php?medication_id=<?php echo $row1['medication_id']; ?>&total=<?php echo $row1['price']; ?>">Pay to Medication</a></li>
                          <?php } ?>
                            <li><a class="dropdown-item" href="cancelMedication.php?medication_id=<?php echo $row1['medication_id']; ?>">Cancel Order</a></li>
                          </ul>
                        </div>
                    </div>
                  
                  </div>
                  <?php  $count++; } ?>
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