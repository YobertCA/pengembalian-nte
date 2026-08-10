<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Teknisi</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            background: #f4f6f9;
            color: #1f2937;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background: #123b67;
            color: white;
            padding: 25px 18px;
        }

        .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .logo h2 {
            font-size: 24px;
            margin-bottom: 5px;
        }

        .logo p {
            font-size: 13px;
            opacity: 0.7;
        }

        .menu-title {
            font-size: 11px;
            text-transform: uppercase;
            opacity: 0.6;
            margin: 20px 12px 10px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            text-decoration: none;
            padding: 13px 15px;
            margin-bottom: 6px;
            border-radius: 8px;
            font-size: 14px;
            transition: 0.2s;
        }

        .menu a:hover,
        .menu a.active {
            background: rgba(255, 255, 255, 0.15);
        }

        .icon {
            width: 22px;
            text-align: center;
            font-size: 18px;
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
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
            font-size: 20px;
        }

        .datetime {
            font-size: 13px;
            color: #6b7280;
            margin-top: 3px;
            white-space: nowrap;
        }

        .user {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-icon {
            width: 40px;
            height: 40px;
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

        .main {
            padding: 35px;
        }

        .welcome {
            background: white;
            border-radius: 14px;
            padding: 30px;
            margin-bottom: 25px;
            border: 1px solid #e5e7eb;
        }

        .welcome h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .welcome p {
            color: #6b7280;
            font-size: 14px;
        }

        /* CARDS */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            border-radius: 14px;
            padding: 25px;
            border: 1px solid #e5e7eb;
        }

        .card-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            background: #e8f1fb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 21px;
            margin-bottom: 15px;
        }

        .card h2 {
            font-size: 28px;
            margin-bottom: 5px;
        }

        .card p {
            color: #6b7280;
            font-size: 13px;
        }

        /* QUICK MENU */
        .section {
            background: white;
            border-radius: 14px;
            padding: 25px;
            border: 1px solid #e5e7eb;
        }

        .section h3 {
            margin-bottom: 20px;
        }

        .quick-menu {
            display: flex;
            gap: 15px;
        }

        .quick-menu a {
            text-decoration: none;
            color: #123b67;
            border: 1px solid #dbe3ec;
            padding: 15px 20px;
            border-radius: 10px;
            font-size: 14px;
            transition: 0.2s;
        }

        .quick-menu a:hover {
            background: #f0f5fa;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .sidebar {
                width: 210px;
            }

            .content {
                margin-left: 210px;
            }

            .cards {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .sidebar {
                position: relative;
                width: 100%;
                height: auto;
            }

            .content {
                margin-left: 0;
            }

            .topbar {
                padding: 0 20px;
            }

            .main {
                padding: 20px;
            }

            .quick-menu {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<!-- SIDEBAR -->
<div class="sidebar">

    <div class="logo">
        <h2>TEKNISI</h2>
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

        <a href="pengembalian.php">
            <span class="icon">↩️</span>
            <span>Pengembalian</span>
        </a>

        <a href="download_ba.php">
            <span class="icon">📄</span>
            <span>Download BA</span>
        </a>

    </div>

</div>


<!-- CONTENT -->
<div class="content">

    <!-- TOPBAR -->
    <div class="topbar">

        <div>
            <h3>Beranda</h3>
            <div class="datetime" id="datetime">Memuat waktu...</div>
        </div>

        <div class="user">

            <div class="user-icon">
                👷
            </div>

            <div class="user-info">
                <strong>Teknisi</strong><br>
                <small>Web Teknisi</small>
            </div>

        </div>

    </div>


    <!-- MAIN -->
    <div class="main">

        <div class="welcome">

            <h1>Selamat Datang 👋</h1>

            <p>
                Selamat datang di sistem pengembalian NTE teknisi.
                Silakan pilih menu yang tersedia.
            </p>

        </div>


        <!-- CARDS -->
        <div class="cards">

            <div class="card">

                <div class="card-icon">
                    ↩️
                </div>

                <h2>Pengembalian</h2>

                <p>
                    Input data pengembalian NTE.
                </p>

            </div>


            <div class="card">

                <div class="card-icon">
                    📄
                </div>

                <h2>BA</h2>

                <p>
                    Lihat dan download Berita Acara.
                </p>

            </div>


            <div class="card">

                <div class="card-icon">
                    🗄️
                </div>

                <h2>Database</h2>

                <p>
                    Data tersimpan secara otomatis.
                </p>

            </div>

        </div>


        <!-- QUICK MENU -->
        <div class="section">

            <h3>Akses Cepat</h3>

            <div class="quick-menu">

                <a href="pengembalian.php">
                    ↩️ &nbsp; Isi Pengembalian
                </a>

                <a href="download_ba.php">
                    📄 &nbsp; Lihat BA
                </a>

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
        tahun + " | " +
        jam + ":" + menit + ":" + detik + " WIB";
}

updateDateTime();
setInterval(updateDateTime, 1000);
</script>

</body>
</html>