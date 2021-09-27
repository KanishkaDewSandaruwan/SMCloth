<?php require_once 'connection.php'; 
   session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SM Clothing</title>
  <link rel="icon" type="image/png" href="img/logo/logo.jpg" sizes="300x300" />
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

   <!--     Editor Plugins     -->
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>


  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <?php $viewquery = "SELECT * FROM about";
    $viewresult = mysqli_query($con,$viewquery);
    $row = mysqli_fetch_assoc($viewresult); ?>

  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope-fill"></i><a href="mailto:contact@example.com"><?php echo $row['email']; ?></a>
        <i class="bi bi-phone-fill phone-icon"></i> +94 <?php echo $row['phone']; ?>
      </div>
      <div class="social-links d-none d-md-block">
        <?php if (isset($row['facebook'])) {?>
        <a href="<?php echo $row['facebook']; ?>" class="twitter"><i class="bi bi-twitter"></i></a>
        <?php } ?>
        <?php if (isset($row['twiter'])) {?>
        <a href="<?php echo $row['twiter']; ?>" class="facebook"><i class="bi bi-facebook"></i></a>
        <?php } ?>
        <?php if (isset($row['instragram'])) {?>
        <a href="<?php echo $row['instragram']; ?>" class="instagram"><i class="bi bi-instagram"></i></a>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="index.php">SM Clothing</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#product">Products</a></li>
          <li class="dropdown"><a href="#"><span>Product Category</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <?php
                  $query = "SELECT * FROM category";
                  $result = mysqli_query($con,$query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $get = $row['cat_name'];
                    $id = $row['cat_id'];

                    $bood="SELECT * FROM product where cat_id='".$id."'";
                $query1 = mysqli_query($con,$bood);

                if (mysqli_num_rows($query1) > 0) { ?>
              <li class="dropdown"><a href="more.php?cat_id=<?php echo $row['cat_id']; ?>"><span><?php echo $row['cat_name']; ?></span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                    <?php
                      $product="SELECT * FROM product where cat_id='".$id."'";
                      $query2 = mysqli_query($con,$product);

                        while ($row1 = mysqli_fetch_assoc($query2)) { ?>
                    <li><a href="more.php?product_id=<?php echo $row1['product_id']; ?>"><?php echo $row1['product_name']; ?></a></li>
                  <?php } ?>
                </ul>
              </li>
                <?php } }  ?>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li class="dropdown"><a href="cart.php"><span><i style="font-size: 25px;  padding-right: 10px" class="fas fa-cart-plus"></i></span></i></a>
          <li class="dropdown"><a href="#"><span><i style="font-size: 25px;" class="fas fa-users"></i></span> <i style="font-size: 25px" class="bi bi-chevron-down"></i></a>
            <ul>
              <?php if (isset($_SESSION['customer_id'])){ ?>
              <li class="dropdown"><a href="myorders.php"><span>My Orders</span> <i class="fas fa-cog"></i></a></li>
              <li class="dropdown"><a href="myaccount.php"><span>My Account</span> <i class="fas fa-cog"></i></a></li>
              <li class="dropdown"><a href="logout.php"><span>Logout</span> <i class="fas fa-cog"></i></a></li>
                
              <?php }else{ ?>
              <li class="dropdown"><a href="login.php"><span>Login</span> <i class="fas fa-cog"></i></a></li>
              <li class="dropdown"><a href="register.php"><span>Register</span> <i class="fas fa-cog"></i></a></li>
              <?php } ?>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->