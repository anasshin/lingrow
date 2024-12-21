<?php
session_start();

if (!isset($_SESSION['email'])) {
  header('Location: login.php');
  exit();
}
if (isset($_SESSION['email'])) {
  echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
              var loginButton = document.querySelector(".btn-login");
              if (loginButton) {
                loginButton.textContent = "My Account";
                loginButton.onclick = function() {
                  window.location.href = "account.php";
                };
              }
            });
          </script>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <title>LinGrow</title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon" />
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect" />
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />

  <!-- Vendor CSS Files -->
  <link
    href="assets/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet" />
  <link
    href="assets/vendor/bootstrap-icons/bootstrap-icons.css"
    rel="stylesheet" />
  <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
  <link
    href="assets/vendor/glightbox/css/glightbox.min.css"
    rel="stylesheet" />
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet" />

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="blog-page">
  <header id="header" class="header fixed-top">
    <div class="branding d-flex align-items-center">
      <div
        class="container position-relative d-flex align-items-center justify-content-between">
        <a href="index.php" class="logo d-flex align-items-center">
          <!-- Uncomment the line below if you also wish to use an image logo -->
          <!-- <img src="assets/img/logo.png" alt=""> -->
          <h1 class="sitename">LinGrow</h1>
          <span>.</span>
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="index.php#hero">Home<br /></a></li>
            <li><a href="index.php#about">About</a></li>
            <li><a href="index.php#lang">Language</a></li>
            <li><a href="index.php#team">Team</a></li>
            <li><a href="courses.php" class="active">My Courses</a></li>
            <li><a href="index.php#contact">Contact</a></li>
            <li>
              <button onclick="window.location.href='login.php';" class="btn-login">Sign In</button>
            </li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
      </div>
    </div>
  </header>

  <main class="main">
    <!-- Page Title -->
    <div class="page-title pt-5">
      <nav class="breadcrumbs pt-lg-5">
        <div class="container pt-3">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">English Course</li>
          </ol>
        </div>
      </nav>
    </div>
    <!-- End Page Title -->

    <!-- Blog Posts Section -->
    <div class="container service-details" style="height: 80vh">
      <div class="row gy-4">
        <div class="col-lg-5 sidebar" data-aos="fade-up" data-aos-delay="100">
          <nav class="navbar navbar-expand-md">
            <div class="container-fluid">
              <button
                class="navbar-toggler position-absolute end-0"
                style="top: -55px"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div
                class="offcanvas offcanvas-end"
                tabindex="-1"
                id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                  <!-- <h5 class="offcanvas-title" id="offcanvasNavbarLabel">
                      Offcanvas
                    </h5> -->
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                  <ul
                    class="row pe-3 navbar-nav-scroll"
                    style="max-height: 80vh; overflow-y: auto; width: 100%">
                    <div class="services-list">
                      <h4 class="my-2">Beginner Class</h4>
                      <a href="#" class="active">Introduction</a>
                      <a href="#">Level 1</a>
                      <a href="#">Level 2</a>
                      <a href="#">Level 3</a>
                      <a href="#">Level 4</a>
                      <a href="#">Level 1</a>
                      <a href="#">Level 2</a>
                      <a href="#">Level 3</a>
                      <a href="#">Level 4</a>

                      <h4 class="my-2">Beginner Class</h4>
                      <a href="#" class="">Introduction</a>
                      <a href="#">Level 1</a>
                      <a href="#">Level 1</a>
                      <a href="#">Level 2</a>
                      <a href="#">Level 2</a>
                      <a href="#">Level 3</a>
                      <a href="#">Level 3</a>
                      <a href="#">Level 4</a>
                      <a href="#">Level 4</a>

                      <h4 class="my-2">Beginner Class</h4>
                      <a href="#" class="">Introduction</a>
                      <a href="#">Level 1</a>
                      <a href="#">Level 2</a>
                      <a href="#">Level 3</a>
                      <a href="#">Level 4</a>
                    </div>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>
        <div
          class="col-lg-7 py-3 navbar-nav-scroll"
          data-aos="fade-up"
          data-aos-delay="200">
          <div class="ratio ratio-16x9">
            <iframe
              src="https://www.youtube.com/embed/exIcb2_PTVM"
              title="YouTube video"
              allowfullscreen></iframe>
          </div>
          <h3 class="py-3">Lorem ipsum dolor sit amet.</h3>
          <p>
            Blanditiis voluptate odit ex error ea sed officiis deserunt.
            Cupiditate non consequatur et doloremque consequuntur. Accusantium
            labore reprehenderit error temporibus saepe perferendis fuga
            doloribus vero. Qui omnis quo sit. Dolorem architecto eum et quos
            deleniti officia qui.
          </p>
          <ul>
            <li>
              <i class="bi bi-check-circle"></i>
              <span>Aut eum totam accusantium voluptatem.</span>
            </li>
            <li>
              <i class="bi bi-check-circle"></i>
              <span>Assumenda et porro nisi nihil nesciunt voluptatibus.</span>
            </li>
            <li>
              <i class="bi bi-check-circle"></i>
              <span>Ullamco laboris nisi ut aliquip ex ea</span>
            </li>
          </ul>
          <p>
            Est reprehenderit voluptatem necessitatibus asperiores neque sed
            ea illo. Deleniti quam sequi optio iste veniam repellat odit. Aut
            pariatur itaque nesciunt fuga.
          </p>
          <p>
            Sunt rem odit accusantium omnis perspiciatis officia. Laboriosam
            aut consequuntur recusandae mollitia doloremque est architecto
            cupiditate ullam. Quia est ut occaecati fuga. Distinctio ex
            repellendus eveniet velit sint quia sapiente cumque. Et ipsa
            perferendis ut nihil. Laboriosam vel voluptates tenetur nostrum.
            Eaque iusto cupiditate et totam et quia dolorum in. Sunt molestiae
            ipsum at consequatur vero. Architecto ut pariatur autem ad non
            cumque nesciunt qui maxime. Sunt eum quia impedit dolore alias
            explicabo ea.
          </p>
        </div>
      </div>
    </div>
    <!-- /Blog Posts Section -->
  </main>

  <footer id="footer" class="footer accent-background">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.php" class="logo d-flex align-items-center">
            <span class="sitename">Impact</span>
          </a>
          <p>
            Cras fermentum odio eu feugiat lide par naso tierra. Justo eget
            nada terra videa magna derita valies darta donna mare fermentum
            iaculis eu non diam phasellus.
          </p>
          <div class="social-links d-flex mt-4">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">English</a></li>
            <li><a href="#">Japanese</a></li>
            <li><a href="#">Korean</a></li>
          </ul>
        </div>

        <div
          class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4">
            <strong>Phone:</strong> <span>+1 5589 55488 55</span>
          </p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>
      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>
        © <span>Copyright</span>
        <strong class="px-1 sitename">Impact</strong>
        <span>All Rights Reserved</span>
      </p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
</body>

</html>