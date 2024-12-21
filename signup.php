<?php
include 'db.php';

$errorMsg = '';

if (isset($_POST['signup'])) {
  $email = $_POST['email'] ?? '';
  $name = $_POST['name'] ?? '';
  $password = $_POST['password'] ?? '';

  if (register($email, $name, $password)) {
    header("Location: login.php");
    exit();
  } else {
    $errorMsg = "Sign Up failed. Email already exists.";
  }
}

function register($email, $name, $password)
{
  global $conn;
  if (CheckEmail($email)) {
    return false;
  }

  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO Users (email, nama, password) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $email, $name, $hashed_password);

  if ($stmt->execute()) {
    return true;
  } else {
    return false;
  }
}


function CheckEmail($email)
{
  global $conn;
  $sql = "SELECT * FROM Users WHERE email = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    return true;
  } else {
    return false;
  }
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
  <style>
    .form-signin {
      max-width: 450px;
      padding: 1rem;
    }

    .form-floating {
      color: gray;
    }

    .form-signin .form-floating:focus-within {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="name"] {
      margin-bottom: -1px;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>

  <!-- =======================================================
  * Template Name: Impact
  * Template URL: https://bootstrapmade.com/impact-bootstrap-business-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="portfolio-details-page">
  <main class="main">
    <!-- Page Title -->
    <div class="page-title vh-100">
      <!-- <div class="heading"> -->
      <div class="container">
        <div
          class="row d-flex justify-content-center text-center align-items-center py-5">
          <div class="form-signin">
            <h1 class="sitename mb-5">LinGrow</h1>
            <form action="" method="post">
              <div class="form-floating">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="name@example.com" name="email" />
                <label for="email">Email address</label>
              </div>
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  placeholder="name@example.com" name="name" />
                <label for="name">Name</label>
              </div>
              <div class="form-floating">
                <input
                  type="password"
                  class="form-control"
                  id="passwd"
                  placeholder="Password" name="password" />
                <label for="passwd">Password</label>
              </div>
              <!-- <div
                class="btn-group w-100"
                role="group"
                aria-label="Basic radio toggle button group">
                <input
                  type="radio"
                  class="btn-check"
                  name="btnradio"
                  id="english"
                  autocomplete="off"
                  checked />
                <label class="btn btn-outline-light fw-bold" for="english">English <br />
                  <img
                    src="assets/img/flags/uk.png"
                    alt=""
                    style="width: 50px" /></label>

                <input
                  type="radio"
                  class="btn-check"
                  name="btnradio"
                  id="japan"
                  autocomplete="off" />
                <label class="btn btn-outline-light fw-bold" for="japan">Japanese <br />
                  <img
                    src="assets/img/flags/japan.png"
                    alt=""
                    style="width: 50px" /></label>

                <input
                  type="radio"
                  class="btn-check"
                  name="btnradio"
                  id="korea"
                  autocomplete="off" />
                <label class="btn btn-outline-light fw-bold" for="korea">Korean <br /><img
                    src="assets/img/flags/korea.png"
                    alt=""
                    style="width: 50px" /></label>
              </div> -->
              <input
                type="submit"
                value="Sign Up"
                name="signup"
                class="btn-login w-100 mt-3" />
              <div class="mt-3">
                Don't have an account?
                <a href="login.php" style="color: #ff4545; font-weight: 600">Sign In</a>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- </div> -->
    </div>
    <!-- End Page Title -->
  </main>

  <!-- Scroll Top -->
  <a
    href="#"
    id="scroll-top"
    class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <!-- <div id="preloader"></div> -->

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