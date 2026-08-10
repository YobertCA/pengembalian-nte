<?php

include "koneksi.php";

/* Cek ID */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID pengembalian tidak valid.");
}

$id = intval($_GET['id']);

/* Ambil data */
$query = mysqli_query(
    $conn,
    "SELECT * FROM pengembalian WHERE id = $id"
);

if (mysqli_num_rows($query) == 0) {
    die("Data pengembalian tidak ditemukan.");
}

$data = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Berita Acara Pengembalian</title>

    <style>

        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 0;
            background: #eef1f5;
            color: #111827;
        }

        /* =========================
           TOOLBAR
        ========================= */

        .toolbar {
            background: #123b67;
            padding: 15px 25px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            position: sticky;
            top: 0;
            z-index: 10;
        }

        .toolbar-title {
            color: white;
            font-size: 16px;
            font-weight: bold;
        }

        .toolbar-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            border: none;
            padding: 10px 16px;
            border-radius: 7px;

            text-decoration: none;

            font-size: 13px;
            font-weight: bold;

            cursor: pointer;
        }

        .btn-back {
            background: #e5e7eb;
            color: #111827;
        }

        .btn-print {
            background: white;
            color: #123b67;
        }

        /* =========================
           DOCUMENT
        ========================= */

        .document-wrapper {
            padding: 35px 20px;
        }

        .document {
            width: 210mm;
            min-height: 297mm;

            background: white;

            margin: auto;

            padding: 20mm 22mm;

            box-shadow:
                0 5px 25px rgba(0,0,0,0.12);
        }

        /* =========================
           HEADER
        ========================= */

        .header {
            text-align: center;

            border-bottom: 2px solid #111827;

            padding-bottom: 15px;

            margin-bottom: 25px;
        }

        /* LOGO TELKOM AKSES */

        .logo-ba {
            width: 280px;
            max-width: 100%;
            height: auto;

            display: block;

            margin: 0 auto 15px auto;
        }

        .header h1 {
            font-size: 20px;
            margin: 0 0 8px;

            text-transform: uppercase;
        }

        .header h2 {
            font-size: 17px;
            margin: 0;

            text-transform: uppercase;
        }

        .header p {
            font-size: 12px;
            margin-top: 8px;
        }

        /* =========================
           CONTENT
        ========================= */

        .intro {
            font-size: 13px;
            line-height: 1.8;

            text-align: justify;

            margin-bottom: 20px;
        }

        /* =========================
           DATA
        ========================= */

        .data-table {
            width: 100%;

            border-collapse: collapse;

            margin-bottom: 22px;

            font-size: 13px;
        }

        .data-table td {
            padding: 8px 6px;

            vertical-align: top;
        }

        .data-table .label {
            width: 160px;

            font-weight: bold;
        }

        .data-table .separator {
            width: 15px;
        }

        /* =========================
           MATERIAL
        ========================= */

        .section-title {
            font-size: 14px;

            font-weight: bold;

            margin-top: 18px;
            margin-bottom: 8px;

            text-transform: uppercase;
        }

        .material-table {
            width: 100%;

            border-collapse: collapse;

            font-size: 13px;

            margin-bottom: 18px;
        }

        .material-table th,
        .material-table td {
            border: 1px solid #333;

            padding: 9px;

            text-align: left;
        }

        .material-table th {
            background: #f2f2f2;

            text-align: center;

            font-weight: bold;
        }

        /* =========================
           KETERANGAN
        ========================= */

        .keterangan {
            border: 1px solid #333;

            min-height: 80px;

            padding: 12px;

            font-size: 13px;

            margin-bottom: 35px;
        }

        /* =========================
           SIGNATURE
        ========================= */

        .signature-table {
            width: 100%;

            border-collapse: collapse;

            margin-top: 30px;
        }

        .signature-table td {
            width: 50%;

            text-align: center;

            vertical-align: top;

            padding: 10px;
        }

        .signature-title {
            font-size: 13px;

            margin-bottom: 8px;
        }

        .signature-area {
            height: 120px;

            display: flex;

            justify-content: center;

            align-items: center;
        }

        .signature-area img {
            max-width: 220px;
            max-height: 110px;
        }

        .admin-empty {
            height: 110px;

            width: 220px;

            margin: auto;
        }

        .signature-name {
            font-weight: bold;

            text-decoration: underline;

            font-size: 13px;
        }

        .signature-role {
            font-size: 12px;

            margin-top: 5px;
        }

        /* =========================
           FOOTER
        ========================= */

        .footer {
            margin-top: 35px;

            font-size: 11px;

            text-align: right;

            color: #555;
        }

        /* =========================
           PRINT
        ========================= */

        @media print {

            @page {
                size: A4;

                margin: 0;
            }

            body {
                background: white;
            }

            .toolbar {
                display: none;
            }

            .document-wrapper {
                padding: 0;
            }

            .document {
                width: 210mm;

                min-height: 297mm;

                box-shadow: none;

                margin: 0;

                padding: 20mm 22mm;
            }

        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media(max-width: 900px) {

            .document {
                width: 100%;

                min-height: auto;
            }

            .toolbar {
                flex-direction: column;

                gap: 12px;

                align-items: flex-start;
            }

        }

    </style>

</head>

<body>


<!-- =========================
     TOOLBAR
========================= -->

<div class="toolbar">

    <div class="toolbar-title">

        📄 Berita Acara Pengembalian

    </div>


    <div class="toolbar-buttons">

        <a
            href="download_ba.php"
            class="btn btn-back"
        >
            ← Kembali
        </a>


        <button
            onclick="window.print()"
            class="btn btn-print"
        >
            🖨️ Cetak BA
        </button>

    </div>

</div>


<!-- =========================
     DOCUMENT
========================= -->

<div class="document-wrapper">

    <div class="document">


        <!-- =========================
             HEADER
        ========================= -->

        <div class="header">

            <!-- LOGO TELKOM AKSES -->

            <img
                src="assets/image/logo-telkom-akses.png"
                class="logo-ba"
                alt="Logo Telkom Akses"
            >


            <h1>
                BERITA ACARA
            </h1>


            <h2>
                PENGEMBALIAN NTE
            </h2>


            <p>
                No. Dokumen:
                BA/<?= htmlspecialchars($data['no_inc']) ?>
            </p>

        </div>


        <!-- =========================
             INTRO
        ========================= -->

        <div class="intro">

            Pada hari ini, telah dilakukan pengembalian NTE
            yang berkaitan dengan pekerjaan dengan data sebagai berikut:

        </div>


        <!-- =========================
             DATA PENGEMBALIAN
        ========================= -->

        <table class="data-table">

            <tr>

                <td class="label">
                    Tanggal
                </td>

                <td class="separator">
                    :
                </td>

                <td>

                    <?= date(
                        "d F Y",
                        strtotime($data['tanggal'])
                    ) ?>

                </td>

            </tr>


            <tr>

                <td class="label">
                    No INC
                </td>

                <td class="separator">
                    :
                </td>

                <td>

                    <?= htmlspecialchars($data['no_inc']) ?>

                </td>

            </tr>


            <tr>

                <td class="label">
                    INET
                </td>

                <td class="separator">
                    :
                </td>

                <td>

                    <?= htmlspecialchars($data['inet']) ?>

                </td>

            </tr>


            <tr>

                <td class="label">
                    Nama Teknisi
                </td>

                <td class="separator">
                    :
                </td>

                <td>

                    <?= htmlspecialchars($data['nama_teknisi']) ?>

                </td>

            </tr>


            <tr>

                <td class="label">
                    NIK
                </td>

                <td class="separator">
                    :
                </td>

                <td>

                    <?= htmlspecialchars($data['nik']) ?>

                </td>

            </tr>


            <tr>

                <td class="label">
                    STO
                </td>

                <td class="separator">
                    :
                </td>

                <td>

                    <?= htmlspecialchars($data['sto']) ?>

                </td>

            </tr>

        </table>


        <!-- =========================
             MATERIAL LAMA
        ========================= -->

        <div class="section-title">

            NTE Lama

        </div>


        <table class="material-table">

            <thead>

                <tr>

                    <th>
                        Serial Number
                    </th>

                    <th>
                        Merk
                    </th>

                </tr>

            </thead>


            <tbody>

                <tr>

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

                </tr>

            </tbody>

        </table>


        <!-- =========================
             MATERIAL BARU
        ========================= -->

        <div class="section-title">

            NTE Baru

        </div>


        <table class="material-table">

            <thead>

                <tr>

                    <th>
                        Serial Number
                    </th>

                    <th>
                        Merk
                    </th>

                </tr>

            </thead>


            <tbody>

                <tr>

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

                </tr>

            </tbody>

        </table>


        <!-- =========================
             KETERANGAN
        ========================= -->

        <div class="section-title">

            Keterangan

        </div>


        <div class="keterangan">

            <?= nl2br(
                htmlspecialchars(
                    $data['keterangan']
                )
            ) ?>

        </div>


        <!-- =========================
             TANDA TANGAN
        ========================= -->

        <table class="signature-table">

            <tr>


                <!-- =====================
                     TEKNISI
                ====================== -->

                <td>

                    <div class="signature-title">

                        Teknisi,

                    </div>


                    <div class="signature-area">

                        <?php

                        if (!empty($data['ttd_teknisi'])) {

                            ?>

                            <img
                                src="<?= htmlspecialchars(
                                    $data['ttd_teknisi']
                                ) ?>"
                                alt="Tanda Tangan Teknisi"
                            >

                            <?php

                        }

                        ?>

                    </div>


                    <div class="signature-name">

                        <?= htmlspecialchars(
                            $data['nama_teknisi']
                        ) ?>

                    </div>


                    <div class="signature-role">

                        NIK:

                        <?= htmlspecialchars(
                            $data['nik']
                        ) ?>

                    </div>

                </td>


                <!-- =====================
                     ADMIN
                ====================== -->

                <td>

                    <div class="signature-title">

                        Admin,

                    </div>


                    <div class="signature-area">

                        <?php

                        if (!empty($data['ttd_admin'])) {

                            ?>

                            <img
                                src="<?= htmlspecialchars(
                                    $data['ttd_admin']
                                ) ?>"
                                alt="Tanda Tangan Admin"
                            >

                            <?php

                        } else {

                            ?>

                            <div class="admin-empty"></div>

                            <?php

                        }

                        ?>

                    </div>


                    <div class="signature-name">

                        <?= !empty($data['nama_admin'])
                            ? htmlspecialchars($data['nama_admin'])
                            : '__________________________'
                        ?>

                    </div>


                    <div class="signature-role">

                        NIK:
                        <?= !empty($data['nik_admin'])
                            ? htmlspecialchars($data['nik_admin'])
                            : '-'
                        ?>

                    </div>

                </td>

            </tr>

        </table>


        <!-- =========================
             FOOTER
        ========================= -->

        <div class="footer">

            ID Pengembalian:

            <?= htmlspecialchars(
                $data['id']
            ) ?>

        </div>


    </div>

</div>


</body>

</html>