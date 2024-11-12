<?php
include './db.connection/db_connection.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="keywords" content="Site keywords here" />
  <meta name="description" content="" />
  <meta name="copyright" content="" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!-- Title -->
  <title>Varma Infra</title>

  <!-- Favicon -->
  <link rel="icon" href="img/logos/main_logo.png" />

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
    rel="stylesheet" />

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <!-- Nice Select CSS -->
  <link rel="stylesheet" href="css/nice-select.css" />
  <!-- Font Awesome CSS -->
  <link rel="stylesheet" href="css/font-awesome.min.css" />
  <!-- icofont CSS -->
  <link rel="stylesheet" href="css/icofont.css" />
  <!-- Slicknav -->
  <link rel="stylesheet" href="css/slicknav.min.css" />
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="css/owl-carousel.css" />
  <!-- Datepicker CSS -->
  <link rel="stylesheet" href="css/datepicker.css" />
  <!-- Animate CSS -->
  <link rel="stylesheet" href="css/animate.min.css" />
  <!-- Magnific Popup CSS -->
  <link rel="stylesheet" href="css/magnific-popup.css" />

  <!-- Medipro CSS -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="css/responsive.css" />

  <link
    href="assets/vendor/fontawesome-free/css/all.min.css"
    rel="stylesheet" />
</head>

<body>
  <div class="preloader">
    <div class="loader">
      <div class="loader-outter"></div>
      <div class="loader-inner"></div>

      <div class="indicator">
        <!-- <svg width="16px" height="12px">
                        <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                        <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
                    </svg> -->
      </div>
    </div>
  </div>

  <header class="header">
    <div class="topbar d-none d-md-block">
      <div class="container">
        <div class="row top_section_space">
          <div class="">
            <ul class="top-link">
              <li>
                <i class="fa fa-envelope its_color"></i>
                varmaindustrialenterprises@gmail.com
              </li>
            </ul>
          </div>

          <div class="">
            <ul class="top-contact">
              <li><i class="fa fa-phone its_color"></i>+91 7286878601, +91 7286878602,
                +91 7286878603</li>
            </ul>
          </div>

          <div class="row">
            <a href="https://www.facebook.com/varmagroups2024" class=""><i class="icofont-facebook its_color"></i></a>
            &nbsp; &nbsp;&nbsp; &nbsp;
            <a href="https://www.instagram.com/varmagroups2024/"><i class="icofont-instagram its_color"></i></a> &nbsp;
            &nbsp;&nbsp; &nbsp;

          </div>
        </div>
      </div>
    </div>

    <div class="header-inner">
      <div class="container">
        <div class="inner">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-12">
              <div class="logo">
                <a href="index.html">
                  <img
                    src="img/logos/main_logo.png"
                    alt=""
                    class="logoo img-fluid" />
                </a>
              </div>
              <!-- End Logo -->
              <!-- Mobile Nav -->
              <div class="mobile-nav"></div>
              <!-- End Mobile Nav -->
            </div>
            <div class="col-lg-7 col-md-9 col-12">
              <!-- Main Menu -->
              <div class="main-menu">
                <nav class="navigation">
                  <ul class="nav menu">
                    <li class=" nav_strong">
                      <a href="index.html">Home </a>
                    </li>

                    <li class="nav_strong">
                      <a href="about.html">About Us </a>
                    </li>

                    <li class="nav_strong">
                      <a href="gallery.html">Gallery </a>
                    </li>

                    <li class="nav_strong">
                      <a href="contact.php">Contact Us</a>
                    </li>

                    <li class="nav_strong active">
                      <a href="posts.php">Posts</a>
                    </li>
                    <li class="app_btn_md d-none d-md-block d-lg-none">
                      <a
                        href="appointment.php"
                        style="color: #ffffff"
                        class="btn">Book Appointment</a>
                    </li>

                    <li class="app_btn_md d-md-none">
                      <a href="appointment.php" class="btn">Book Appointment</a>
                    </li>
                  </ul>
                </nav>
              </div>
              <!--/ End Main Menu -->
            </div>
            <div class="col-lg-2 col-12">
              <div class="get-quote">
                <a href="appointment.php" class="btn">Book Appointment</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <main id="main">
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">
        <div class="section-title" style="margin-top: 50px">
          <h2>Our Works</h2>
        </div>
      </div>



      <div class="container">
        <div class="row">
          <?php
          // Fetch image data from database
          $image_sql = "SELECT id, title, image_path, created_at FROM image_uploads ORDER BY created_at DESC";
          $image_result = $conn->query($image_sql);

          if ($image_result->num_rows > 0) {
            while ($image_row = $image_result->fetch_assoc()) {
              $image_base = "admin/public/";
              $image_path = $image_base . $image_row['image_path'];
              echo "
                                            <div class='col-12 col-md-4 col-custom my-2'>
                                                <div class='card card-custom'>
                                                    <img src='{$image_path}' class='card-img-top' alt='{$image_row['title']}'>
                                                 
                                                    <div class='card-body'>
                                                        <h5 class='card-title'>{$image_row['title']}</h5>
                                                        <p class='card-text'>Uploaded on: {$image_row['created_at']}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        ";
            }
          } else {
            echo "<p>No images found.</p>";
          }

          $conn->close();
          ?>
        </div>
      </div>


    </section>
    <!-- End Contact Section -->
  </main>
  <!-- End #main -->

  <footer id="footer" class="footer">
      <!-- Footer Top -->
      <div class="footer-top">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12 text-center">
              <a href="index.html">
                <img
                  src="img/logos/main_logo 1.png"
                  class="main_logo_style img-fluid"
                  alt=""
              /></a>
            </div>
            <div class="col-lg-2 col-md-6 col-6">
              <div class="single-footer f-link">
                <h2>Quick Links</h2>
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-12">
                    <ul>
                      <li>
                        <a href="index.html"
                          ><i class="fa fa-check-circle" aria-hidden="true"></i
                          >Home</a
                        >
                      </li>
                      <li>
                        <a href="about.html"
                          ><i class="fa fa-check-circle" aria-hidden="true"></i
                          >About Us</a
                        >
                      </li>

                      <li>
                        <a href="gallery.html"
                          ><i class="fa fa-check-circle" aria-hidden="true"></i
                          >Gallery</a
                        >
                      </li>
                      <li>
                        <a href="contact.php"
                          ><i class="fa fa-check-circle" aria-hidden="true"></i
                          >Contact</a
                        >
                      </li>
                      <li>
                        <a href="posts.php"
                          ><i class="fa fa-check-circle" aria-hidden="true"></i
                          >Posts</a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
              <div class="single-footer">
                <h2>Open Hours</h2>
                <ul class="footul mt-2">
                  <li class="footli">monday-Saturday : 9am - 6pm</li>
                  <li class="footli">Sunday : Holiday</li>
                </ul>
              </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="single-footer">
                <h2>Contact Us</h2>
                <p>Plot No.142 - APIIC,</p>
                <p>Ramanayyapeta - Kakinada</p>
                <p>Kakainda District - 533005</p>
                <p>Andhra Pradeshn- India.</p>
                <p>
                  Cell: +91 7286878601, +91 7286878602, <br />
                  +91 7286878603
                </p>
                <p>Email: varmaindustrialenterprises@gmail.com</p>
                <!-- Social -->
                <ul class="social">
                  <li>
                    <a href="https://www.facebook.com/varmagroups2024"><i class="icofont-facebook"></i></a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/varmagroups2024/"><i class="icofont-instagram"></i></a>
                  </li>
                  <!-- <li>
                    <a href="#"><i class="icofont-youtube"></i></a>
                  </li> -->
                </ul>
                <!-- End Social -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/ End Footer Top -->
      <!-- Copyright -->
      <div
        class="footer-area-bottom theme-bg pb-3"
        style="background-color: #040d30ed"
      >
        <div class="container">
          <div class="row pt-4">
            <div class="col-md-6 col-12">
              <div class="footer-widget__copyright-info info-direction">
                <p class="last_text">
                  <a
                    href="terms.html"
                    style="text-decoration: none; color: #ffffff"
                    >Terms & conditions :
                  </a>
                  <a
                    href="privacy.html"
                    style="text-decoration: none; color: #ffffff"
                  >
                    Privacy & policy</a
                  >
                </p>
              </div>
            </div>

            <div class="col-md-6 col-12 second_divv_end_brand">
              <div
                class="footer-widget__copyright-info info-direction d-flex flex-row justify-content-end align-items-center"
              >
                <a
                  href="https://bhavicreations.com/"
                  target="_blank"
                  style="
                    text-decoration: none;
                    color: #ffffff;
                    display: flex;
                    align-items: center;
                  "
                >
                  <p class="mini_text last_text mb-0" style="color: white">
                    Branding By @
                  </p>
                  <img
                    src="img/bhavi_logo/Bhavi_Branding_Stamp.png"
                    class="img-fluid brand_image"
                    alt=""
                  />
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  <!--/ End Footer Area -->
  <a
    href="https://api.whatsapp.com/send?phone=917286878601"
    style="color: #fff"
    class="whatsapp-link"
    target="_blank">
    <i class="fab fa-whatsapp"></i>
  </a>

  <!-- jquery Min JS -->
  <script src="js/jquery.min.js"></script>
  <!-- jquery Migrate JS -->
  <script src="js/jquery-migrate-3.0.0.js"></script>
  <!-- jquery Ui JS -->
  <script src="js/jquery-ui.min.js"></script>
  <!-- Easing JS -->
  <script src="js/easing.js"></script>
  <!-- Color JS -->
  <script src="js/colors.js"></script>
  <!-- Popper JS -->
  <script src="js/popper.min.js"></script>
  <!-- Bootstrap Datepicker JS -->
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- Jquery Nav JS -->
  <script src="js/jquery.nav.js"></script>
  <!-- Slicknav JS -->
  <script src="js/slicknav.min.js"></script>
  <!-- ScrollUp JS -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- Niceselect JS -->
  <script src="js/niceselect.js"></script>
  <!-- Tilt Jquery JS -->
  <script src="js/tilt.jquery.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="js/owl-carousel.js"></script>
  <!-- counterup JS -->
  <script src="js/jquery.counterup.min.js"></script>
  <!-- Steller JS -->
  <script src="js/steller.js"></script>
  <!-- Wow JS -->
  <script src="js/wow.min.js"></script>
  <!-- Magnific Popup JS -->
  <script src="js/jquery.magnific-popup.min.js"></script>
  <!-- Counter Up CDN JS -->
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="js/bootstrap.min.js"></script>
  <!-- Main JS -->
  <script src="js/main.js"></script>
</body>

</html>