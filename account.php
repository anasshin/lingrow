<?php
session_start();
include 'db.php';
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

$name = $email = $oldpass = $newpass = '';
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT * FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['nama'];
        $email = $row['email'];
    } else {
        echo "User not found.";
        exit();
    }
    $stmt->close();
}

if (isset($_POST['editbio'])) {
    $name = $_POST['name'];
    $new_email = $_POST['email'];

    $update_query = "UPDATE Users SET nama = ?, email = ? WHERE email = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("sss", $name, $new_email, $email);

    if ($update_stmt->execute()) {
        $_SESSION['email'] = $new_email;
        header('Location: account.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $update_stmt->close();
}

if (isset($_POST['editpasswd'])) {
    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];

    $update_query = "UPDATE Users SET password = ? WHERE email = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ss", $newpass, $email);

    if ($update_stmt->execute()) {
        header('Location: account.php');
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $update_stmt->close();
}
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/css/main.css" rel="stylesheet" />
</head>

<body>
    <header id="header" class="header fixed-top">
        <div class="branding d-flex align-items-center">
            <div class="container position-relative d-flex align-items-center justify-content-between">
                <a href="index.php" class="logo d-flex align-items-center">
                    <h1 class="sitename">LinGrow</h1>
                    <span>.</span>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="index.php#hero" class="active">Home<br /></a></li>
                        <li><a href="index.php#about">About</a></li>
                        <li><a href="index.php#lang">Language</a></li>
                        <li><a href="index.php#team">Team</a></li>
                        <li><a href="courses.php">My Courses</a></li>
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
    <div class="container-xl px-4 mt-5 pt-lg-3">
        <nav class="nav nav-borders mt-5">
            <a class="nav-link active ms-0" href="account.php" target="__blank">Profile</a>
        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-xl-4">
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Profile Picture</div>
                    <div class="card-body text-center">
                        <img class="img-account-profile w-50 rounded-circle mb-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <button class="btn btn-primary" type="button">Upload new image</button>
                    </div>
                    <input type="submit" value="Logout" class="btn-login text-black fw-bold w-full m-3" name="logout" />
                </div>
            </div>
            <div class="col-xl-8">
                <div class="card mb-4">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row gx-3 mb-3">
                                <div class="col">
                                    <label class="small mb-1" for="name">Full Name</label>
                                    <input class="form-control" id="name" type="text" placeholder="Enter your name" value="<?= htmlspecialchars($name) ?>" name="name">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="mb-3">
                                    <label class="small mb-1" for="email">Email address</label>
                                    <input class="form-control" id="email" type="email" placeholder="Enter your email address" value="<?= htmlspecialchars($email) ?>" name="email">
                                </div>
                                <input type="submit" value="Save Change" class="btn-login text-black fw-bold w-50 mx-auto" name="editbio" />
                                <div class="row gx-3 mb-3 mt-lg-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="oldpass">Old Password</label>
                                        <input class="form-control" id="oldpass" type="password" placeholder="Enter your old password" value="" name="oldpass">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="newpass">New Password</label>
                                        <input class="form-control" id="newpass" type="text" placeholder="Enter your New Password" name="newpass">
                                    </div>
                                </div>
                                <input type="submit" value="Change Password" class="btn-login text-black fw-bold w-50 mx-auto" name="editpasswd" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>