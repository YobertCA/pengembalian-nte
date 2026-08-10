<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");

/* Hitung total pengembalian */
$query_total = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total FROM pengembalian"
);

$total = mysqli_fetch_assoc($query_total)['total'];

/* Hitung TTD Admin yang sudah diisi */
$query_sudah = mysqli_query(
    $conn,
    "SELECT COUNT(*) AS total
     FROM pengembalian
     WHERE ttd_admin IS NOT NULL
     AND ttd_admin != ''"
);

$sudah = mysqli_fetch_assoc($query_sudah)['total'];

/* Hitung yang belum TTD Admin */
$belum = $total - $sudah;
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Admin - Beranda NTE</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #f4f6f9;
            color: #172b4d;
        }

        /* SIDEBAR */

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;

            width: 260px;
            height: 100vh;

            background: #123b67;
            color: white;

            padding: 28px 18px;
        }

        .logo {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo h2 {
            margin: 0 0 5px;
            font-size: 26px;
        }

        .logo p {
            margin: 0;
            font-size: 13px;
            opacity: 0.75;
        }

        .menu-title {
            font-size: 11px;
            opacity: 0.6;
            margin: 0 12px 12px;
            text-transform: uppercase;
        }

        .menu a {
            display: flex;
            align-items: center;

            gap: 12px;

            padding: 14px 15px;

            margin-bottom: 7px;

            border-radius: 9px;

            color: white;
            text-decoration: none;

            font-size: 14px;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255,255,255,0.16);
        }

        .icon {
            width: 22px;
            text-align: center;
            font-size: 18px;
        }

        /* CONTENT */

        .content {
            margin-left: 260px;
            min-height: 100vh;
        }

        .topbar {
            height: 75px;

            background: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 35px;

            border-bottom: 1px solid #e5e7eb;
        }

        .topbar h3 {
            margin: 0;
            font-size: 20px;
        }

        .datetime {
            margin-top: 3px;
            font-size: 13px;
            color: #6b7280;
            white-space: nowrap;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-icon {
            width: 42px;
            height: 42px;

            border-radius: 50%;

            background: #e8f1fb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 20px;
        }

        .user-info small {
            color: #6b7280;
        }

        /* MAIN */

        .main {
            padding: 35px;
        }

        .welcome {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 28px;

            margin-bottom: 25px;
        }

        .welcome h1 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .welcome p {
            margin: 0;
            color: #6b7280;
            font-size: 14px;
        }

        /* CARDS */

        .cards {
            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 20px;
        }

        .card {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            padding: 24px;
        }

        .card-icon {
            width: 45px;
            height: 45px;

            border-radius: 10px;

            background: #eaf2fb;

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 21px;

            margin-bottom: 15px;
        }

        .card h2 {
            margin: 0 0 5px;
            font-size: 30px;
        }

        .card p {
            margin: 0;
            color: #6b7280;
            font-size: 13px;
        }

        /* RESPONSIVE */

        @media(max-width: 900px) {

            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .main {
                padding: 20px;
            }

        }

    </style>

</head>

<body>


<!-- SIDEBAR -->

<div class="sidebar">

    <div class="logo">

        <h2>ADMIN</h2>

        <p>Pengembalian NTE</p>

    </div>


    <div class="menu-title">
        Menu Utama
    </div>


    <div class="menu">

        <a href="index.php" class="active">

            <span class="icon">🏠</span>

            <span>Beranda</span>

        </a>


        <a href="riwayat.php">

            <span class="icon">📋</span>

            <span>Riwayat</span>

        </a>


        <a href="export_excel.php">

            <span class="icon">📥</span>

            <span>Download Excel</span>

        </a>

    </div>

</div>



<!-- CONTENT -->

<div class="content">


    <!-- TOPBAR -->

    <div class="topbar">

        <div>
            <h3>
                Beranda
            </h3>

            <div class="datetime" id="datetime">
                Memuat waktu...
            </div>
        </div>


        <div class="user">

            <div class="user-icon">
                👨‍💼
            </div>

            <div class="user-info">

                <strong>
                    Admin
                </strong>

                <br>

                <small>
                    Web Admin
                </small>

            </div>

        </div>

    </div>



    <!-- MAIN -->

    <div class="main">


        <!-- WELCOME -->

        <div class="welcome">

            <h1>
                Selamat Datang 👋
            </h1>

            <p>
                Selamat datang di sistem administrasi
                pengembalian NTE teknisi.
            </p>

        </div>



        <!-- STATISTIK -->

        <div class="cards">


            <!-- TOTAL -->

            <div class="card">

                <div class="card-icon">
                    📋
                </div>

                <h2>
                    <?= $total ?>
                </h2>

                <p>
                    Total Pengembalian NTE
                </p>

            </div>



            <!-- SUDAH TTD -->

            <div class="card">

                <div class="card-icon">
                    ✍️
                </div>

                <h2>
                    <?= $sudah ?>
                </h2>

                <p>
                    Sudah TTD Admin
                </p>

            </div>



            <!-- BELUM TTD -->

            <div class="card">

                <div class="card-icon">
                    ⏳
                </div>

                <h2>
                    <?= $belum ?>
                </h2>

                <p>
                    Menunggu TTD Admin
                </p>

            </div>


        </div>


    </div>

</div>


<script>
function updateDateTime() {
    const now = new Date();

    const hari = [
        "Minggu",
        "Senin",
        "Selasa",
        "Rabu",
        "Kamis",
        "Jumat",
        "Sabtu"
    ];

    const bulan = [
        "Januari",
        "Februari",
        "Maret",
        "April",
        "Mei",
        "Juni",
        "Juli",
        "Agustus",
        "September",
        "Oktober",
        "November",
        "Desember"
    ];

    const namaHari = hari[now.getDay()];
    const tanggal = now.getDate();
    const namaBulan = bulan[now.getMonth()];
    const tahun = now.getFullYear();

    const jam = String(now.getHours()).padStart(2, "0");
    const menit = String(now.getMinutes()).padStart(2, "0");
    const detik = String(now.getSeconds()).padStart(2, "0");

    document.getElementById("datetime").textContent =
        namaHari + ", " +
        tanggal + " " +
        namaBulan + " " +
        tahun +
        " | " +
        jam + ":" + menit + ":" + detik + " WIB";
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>

</body>

</html>