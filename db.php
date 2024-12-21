<?php

$conn = mysqli_connect("localhost", "root", "password", "db_lingrow");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
