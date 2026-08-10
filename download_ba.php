<?php
include "koneksi.php";

$query = mysqli_query($conn, "
    SELECT *
    FROM pengembalian
    ORDER BY id DESC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Download BA - Teknisi</title>

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

        /* MAIN */
        .main {
            padding: 35px;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #6b7280;
            font-size: 14px;
        }

        /* TABLE */
        .table-container {
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
            font-size: 17px;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 900px;
        }

        th {
            background: #f8fafc;
            color: #374151;
            font-size: 13px;
            text-align: left;
            padding: 15px;
            border-bottom: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eef0f3;
            font-size: 13px;
            white-space: nowrap;
        }

        tr:hover td {
            background: #fafbfc;
        }

        /* STATUS TTD */
        .status {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: bold;
        }

        .status-sudah {
            background: #dcfce7;
            color: #166534;
        }

        .status-belum {
            background: #fef3c7;
            color: #92400e;
        }

        /* BUTTON */
        .btn {
            display: inline-block;
            text-decoration: none;
            border: none;
            padding: 8px 13px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-view {
            background: #123b67;
            color: white;
        }

        .btn-view:hover {
            background: #0e2e51;
        }

        /* EMPTY */
        .empty {
            text-align: center;
            padding: 50px 20px;
            color: #6b7280;
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 10px;
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
        <h2>TEKNISI</h2>
        <p>Pengembalian Material</p>
    </div>

    <div class="menu-title">
        Menu Utama
    </div>

    <div class="menu">

        <a href="index.php">
            <span class="icon">🏠</span>
            <span>Beranda</span>
        </a>

        <a href="pengembalian.php">
            <span class="icon">↩️</span>
            <span>Pengembalian</span>
        </a>

        <a href="download_ba.php" class="active">
            <span class="icon">📄</span>
            <span>Download BA</span>
        </a>

    </div>

</div>


<!-- CONTENT -->
<div class="content">

    <div class="topbar">

        <h3>Download BA</h3>

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


    <div class="main">

        <div class="page-header">

            <h1>Berita Acara</h1>

            <p>
                Pilih data pengembalian untuk melihat Berita Acara.
            </p>

        </div>


        <div class="table-container">

            <div class="table-header">

                <h3>Daftar Pengembalian</h3>

            </div>


            <?php if (mysqli_num_rows($query) > 0) { ?>

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
                                <th>TTD Teknisi</th>
                                <th>TTD Admin</th>
                                <th>Aksi</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                            $no = 1;

                            while ($data = mysqli_fetch_assoc($query)) {

                            ?>

                                <tr>

                                    <td>
                                        <?= $no++ ?>
                                    </td>

                                    <td>
                                        <?= date("d-m-Y", strtotime($data['tanggal'])) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($data['no_inc']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($data['inet']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($data['nama_teknisi']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($data['nik']) ?>
                                    </td>

                                    <td>
                                        <?= htmlspecialchars($data['sto']) ?>
                                    </td>

                                    <td>

                                        <?php if (!empty($data['ttd_teknisi'])) { ?>

                                            <span class="status status-sudah">
                                                ✓ Sudah
                                            </span>

                                        <?php } else { ?>

                                            <span class="status status-belum">
                                                Belum
                                            </span>

                                        <?php } ?>

                                    </td>

                                    <td>

                                        <?php if (!empty($data['ttd_admin'])) { ?>

                                            <span class="status status-sudah">
                                                ✓ Sudah
                                            </span>

                                        <?php } else { ?>

                                            <span class="status status-belum">
                                                Belum
                                            </span>

                                        <?php } ?>

                                    </td>

                                    <td>

                                        <a
                                            href="lihat_ba.php?id=<?= $data['id'] ?>"
                                            class="btn btn-view"
                                        >
                                            📄 Lihat BA
                                        </a>

                                    </td>

                                </tr>

                            <?php } ?>

                        </tbody>

                    </table>

                </div>

            <?php } else { ?>

                <div class="empty">

                    <div class="empty-icon">
                        📄
                    </div>

                    <p>
                        Belum ada data pengembalian.
                    </p>

                </div>

            <?php } ?>

        </div>

    </div>

</div>

</body>
</html>