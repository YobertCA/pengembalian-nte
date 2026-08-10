<?php

$host = "sql307.infinityfree.com";
$user = "if0_42613645";
$password = "C1waEXUt8dve";
$database = "if0_42613645_ba_nte";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8mb4");

?>
