<?php
include "koneksi.php";

/* Ambil semua data pengembalian */
$query = mysqli_query(
    $conn,
    "SELECT * FROM pengembalian ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Riwayat Pengembalian NTE</title>

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

        .page-title {
            margin-bottom: 22px;
        }

        .page-title h1 {
            margin: 0 0 6px;

            font-size: 28px;
        }

        .page-title p {
            margin: 0;

            color: #6b7280;

            font-size: 14px;
        }

        /* TABLE */

        .table-box {
            background: white;

            border: 1px solid #e5e7eb;

            border-radius: 14px;

            overflow: hidden;
        }

        .table-header {
            padding: 22px 25px;

            border-bottom: 1px solid #e5e7eb;
        }

        .table-header h3 {
            margin: 0;

            font-size: 17px;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;

            border-collapse: collapse;

            min-width: 1250px;
        }

        th {
            background: #f8fafc;

            text-align: left;

            padding: 14px;

            font-size: 12px;

            border-bottom: 1px solid #e5e7eb;

            white-space: nowrap;
        }

        td {
            padding: 14px;

            font-size: 13px;

            border-bottom: 1px solid #eef0f3;

            white-space: nowrap;
        }

        tr:hover {
            background: #fafcff;
        }

        /* STATUS */

        .status {
            display: inline-block;

            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;

            font-weight: bold;
        }

        .sudah {
            background: #dcfce7;

            color: #166534;
        }

        .belum {
            background: #fef3c7;

            color: #92400e;
        }

        /* BUTTON */

        .btn {
            display: inline-block;

            padding: 8px 13px;

            border-radius: 7px;

            background: #123b67;

            color: white;

            text-decoration: none;

            font-size: 12px;

            font-weight: bold;
        }

        .btn:hover {
            background: #0d2e52;
        }

        .empty {
            text-align: center;

            padding: 35px;

            color: #6b7280;
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

        <a href="index.php">

            <span class="icon">🏠</span>

            <span>Beranda</span>

        </a>


        <a href="riwayat.php" class="active">

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

        <h3>
            Riwayat
        </h3>


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


        <div class="page-title">

            <h1>
                Riwayat Pengembalian NTE
            </h1>

            <p>
                Seluruh data pengembalian NTE yang telah diinput oleh teknisi.
            </p>

        </div>



        <div class="table-box">


            <div class="table-header">

                <h3>
                    Daftar Pengembalian NTE
                </h3>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Tanggal</th>

                            <th>No INC</th>

                            <th>INET</th>

                            <th>Nama Teknisi</th>

                            <th>NIK</th>

                            <th>STO</th>

                            <th>SN Lama</th>

                            <th>Merk Lama</th>

                            <th>SN Baru</th>

                            <th>Merk Baru</th>

                            <th>TTD Teknisi</th>

                            <th>TTD Admin</th>

                            <th>Aksi</th>

                        </tr>

                    </thead>


                    <tbody>

                    <?php

                    $no = 1;

                    if (mysqli_num_rows($query) > 0) {

                        while ($data = mysqli_fetch_assoc($query)) {

                    ?>

                        <tr>

                            <td>
                                <?= $no++ ?>
                            </td>


                            <td>

                                <?= date(
                                    "d-m-Y",
                                    strtotime($data['tanggal'])
                                ) ?>

                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['no_inc']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['inet']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['nama_teknisi']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['nik']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['sto']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['sn_lama']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['merk_lama']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['sn_baru']
                                ) ?>
                            </td>


                            <td>
                                <?= htmlspecialchars(
                                    $data['merk_baru']
                                ) ?>
                            </td>


                            <!-- TTD TEKNISI -->

                            <td>

                                <?php if (!empty($data['ttd_teknisi'])) { ?>

                                    <span class="status sudah">
                                        ✓ Sudah
                                    </span>

                                <?php } else { ?>

                                    <span class="status belum">
                                        Belum
                                    </span>

                                <?php } ?>

                            </td>


                            <!-- TTD ADMIN -->

                            <td>

                                <?php if (!empty($data['ttd_admin'])) { ?>

                                    <span class="status sudah">
                                        ✓ Sudah
                                    </span>

                                <?php } else { ?>

                                    <span class="status belum">
                                        Belum
                                    </span>

                                <?php } ?>

                            </td>


                            <!-- AKSI -->

                            <td>

                                <a
                                    href="lihat_ba.php?id=<?= $data['id'] ?>"
                                    class="btn"
                                >
                                    📄 Lihat BA
                                </a>

                            </td>

                        </tr>

                    <?php

                        }

                    } else {

                    ?>

                        <tr>

                            <td
                                colspan="14"
                                class="empty"
                            >
                                Belum ada data pengembalian NTE.

                            </td>

                        </tr>

                    <?php

                    }

                    ?>

                    </tbody>

                </table>

            </div>

        </div>


    </div>

</div>


</body>

</html>