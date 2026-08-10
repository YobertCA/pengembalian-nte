<?php
include "koneksi.php";

if (!isset($_GET['id'])) {
    die("ID pengembalian tidak ditemukan.");
}

$id = intval($_GET['id']);

$query = mysqli_query(
    $conn,
    "SELECT * FROM pengembalian WHERE id = $id"
);

if (!$query || mysqli_num_rows($query) == 0) {
    die("Data pengembalian tidak ditemukan.");
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Berita Acara Pengembalian NTE</title>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #eef2f7;
            font-family: Arial, Helvetica, sans-serif;
            color: #111827;
        }

        /* TOP BAR */

        .topbar {
            height: 58px;
            background: #123b67;
            color: white;

            display: flex;
            align-items: center;
            justify-content: space-between;

            padding: 0 25px;
        }

        .topbar-title {
            font-size: 17px;
            font-weight: bold;
        }

        .topbar-buttons {
            display: flex;
            gap: 10px;
        }

        .btn {
            border: none;
            padding: 10px 18px;
            border-radius: 7px;

            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
            font-size: 13px;
        }

        .btn-back,
        .btn-print {
            background: white;
            color: #123b67;
        }

        /* BA */

        .page {
            width: 210mm;
            min-height: 297mm;

            margin: 35px auto;

            background: white;

            padding: 25mm 20mm;

            box-shadow: 0 5px 25px rgba(0,0,0,0.10);
        }

        /* HEADER */

        .header {
            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;

            min-height: 75px;

            margin-bottom: 18px;
        }

        .logo {
            position: absolute;

            left: 0;
            top: 0;

            width: 155px;
            height: auto;
        }

        .judul {
            text-align: center;
            width: 100%;
        }

        .judul h1 {
            margin: 0;
            font-size: 21px;
        }

        .judul h2 {
            margin: 6px 0 5px;
            font-size: 18px;
        }

        .judul p {
            margin: 0;
            font-size: 12px;
        }

        .garis {
            border-bottom: 2px solid #111827;
            margin: 15px 0 25px;
        }

        /* ISI */

        .isi {
            font-size: 13px;
            line-height: 1.7;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;

            margin-top: 15px;
            margin-bottom: 18px;
        }

        .data-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .label {
            width: 170px;
            font-weight: bold;
        }

        .titik {
            width: 20px;
            text-align: center;
        }

        /* NTE */

        .section-title {
            font-weight: bold;
            font-size: 14px;

            margin-top: 14px;
            margin-bottom: 5px;
        }

        .material-table {
            width: 100%;
            border-collapse: collapse;

            margin-bottom: 15px;
        }

        .material-table th,
        .material-table td {
            border: 1px solid #222;

            padding: 7px;

            font-size: 12px;
        }

        .material-table th {
            background: #f1f1f1;
            text-align: center;
        }

        /* KETERANGAN */

        .keterangan {
            border: 1px solid #222;

            min-height: 75px;

            padding: 10px;

            font-size: 12px;

            white-space: pre-wrap;

            margin-top: 5px;
        }

        /* TTD */

        .ttd-wrapper {
            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 70px;

            margin-top: 40px;

            text-align: center;
        }

        .ttd-box {
            min-height: 190px;
        }

        .ttd-title {
            font-size: 13px;
            margin-bottom: 8px;
        }

        .ttd-area {
            height: 95px;

            display: flex;

            align-items: center;
            justify-content: center;
        }

        .ttd-area img {
            max-width: 160px;
            max-height: 80px;
        }

        .ttd-kosong {
            height: 95px;

            display: flex;

            align-items: center;
            justify-content: center;

            color: #9ca3af;

            font-size: 11px;
        }

        .nama-ttd {
            margin-top: 8px;

            font-weight: bold;

            font-size: 13px;
        }

        .nik {
            font-size: 12px;

            margin-top: 3px;
        }

        .id-data {
            text-align: right;

            margin-top: 10px;

            font-size: 11px;

            color: #4b5563;
        }

        /* FORM ADMIN */

        .ttd-admin-form {
            margin-top: 30px;

            padding: 18px;

            border: 1px solid #dbe2ea;

            border-radius: 10px;

            background: #f8fafc;
        }

        .ttd-admin-form h3 {
            margin: 0 0 8px;
            font-size: 15px;
        }

        .ttd-admin-form p {
            margin: 0 0 15px;

            font-size: 12px;

            color: #6b7280;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-group label {
            display: block;

            margin-bottom: 6px;

            font-size: 13px;

            font-weight: bold;
        }

        .form-group input {
            width: 100%;

            padding: 11px 12px;

            border: 1px solid #cbd5e1;

            border-radius: 7px;

            font-size: 13px;

            outline: none;
        }

        .form-group input:focus {
            border-color: #123b67;
        }

        canvas {
            width: 100%;
            height: 150px;

            background: white;

            border: 1px solid #cbd5e1;

            border-radius: 7px;

            cursor: crosshair;

            touch-action: none;
        }

        .form-buttons {
            margin-top: 12px;

            display: flex;

            gap: 10px;
        }

        .btn-save {
            background: #123b67;
            color: white;
        }

        .btn-clear {
            background: #e5e7eb;
            color: #111827;
        }

        /* PRINT */

        @media print {

            body {
                background: white;
            }

            .topbar,
            .ttd-admin-form {
                display: none;
            }

            .page {
                margin: 0;

                width: 210mm;
                min-height: 297mm;

                box-shadow: none;

                padding: 20mm;
            }

        }

    </style>

</head>

<body>


<!-- TOP BAR -->

<div class="topbar">

    <div class="topbar-title">
        📄 Berita Acara Pengembalian NTE
    </div>

    <div class="topbar-buttons">

        <a
            href="riwayat.php"
            class="btn btn-back"
        >
            ← Kembali
        </a>

        <button
            onclick="window.print()"
            class="btn btn-print"
        >
            🖨 Cetak BA
        </button>

    </div>

</div>



<!-- BA -->

<div class="page">


    <!-- HEADER -->

    <div class="header">

        <img
            src="../teknisi/assets/image/logo-telkom-akses.png"
            class="logo"
            alt="Telkom Akses"
        >

        <div class="judul">

            <h1>
                BERITA ACARA
            </h1>

            <h2>
                PENGEMBALIAN NTE
            </h2>

            <p>
                No. Dokumen: BA/<?= htmlspecialchars($data['no_inc']) ?>
            </p>

        </div>

    </div>


    <div class="garis"></div>



    <!-- ISI -->

    <div class="isi">

        <p>
            Pada hari ini, telah dilakukan pengembalian NTE
            yang berkaitan dengan pekerjaan dengan data sebagai berikut:
        </p>


        <!-- DATA -->

        <table class="data-table">

            <tr>
                <td class="label">Tanggal</td>
                <td class="titik">:</td>
                <td>
                    <?= date(
                        "d F Y",
                        strtotime($data['tanggal'])
                    ) ?>
                </td>
            </tr>

            <tr>
                <td class="label">No INC</td>
                <td class="titik">:</td>
                <td>
                    <?= htmlspecialchars($data['no_inc']) ?>
                </td>
            </tr>

            <tr>
                <td class="label">INET</td>
                <td class="titik">:</td>
                <td>
                    <?= htmlspecialchars($data['inet']) ?>
                </td>
            </tr>

            <tr>
                <td class="label">Nama Teknisi</td>
                <td class="titik">:</td>
                <td>
                    <?= htmlspecialchars($data['nama_teknisi']) ?>
                </td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="titik">:</td>
                <td>
                    <?= htmlspecialchars($data['nik']) ?>
                </td>
            </tr>

            <tr>
                <td class="label">STO</td>
                <td class="titik">:</td>
                <td>
                    <?= htmlspecialchars($data['sto']) ?>
                </td>
            </tr>

        </table>



        <!-- NTE LAMA -->

        <div class="section-title">
            NTE LAMA
        </div>

        <table class="material-table">

            <tr>

                <th>
                    Serial Number
                </th>

                <th>
                    Merk
                </th>

            </tr>

            <tr>

                <td>
                    <?= htmlspecialchars($data['sn_lama']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($data['merk_lama']) ?>
                </td>

            </tr>

        </table>



        <!-- NTE BARU -->

        <div class="section-title">
            NTE BARU
        </div>

        <table class="material-table">

            <tr>

                <th>
                    Serial Number
                </th>

                <th>
                    Merk
                </th>

            </tr>

            <tr>

                <td>
                    <?= htmlspecialchars($data['sn_baru']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($data['merk_baru']) ?>
                </td>

            </tr>

        </table>



        <!-- KETERANGAN -->

        <div class="section-title">
            KETERANGAN
        </div>

        <div class="keterangan">

            <?= htmlspecialchars($data['keterangan']) ?>

        </div>



        <!-- TTD -->

        <div class="ttd-wrapper">


            <!-- TEKNISI -->

            <div class="ttd-box">

                <div class="ttd-title">
                    Teknisi,
                </div>


                <div class="ttd-area">

                    <?php if (!empty($data['ttd_teknisi'])) { ?>

                        <img
                            src="<?= htmlspecialchars($data['ttd_teknisi']) ?>"
                            alt="TTD Teknisi"
                        >

                    <?php } ?>

                </div>


                <div class="nama-ttd">

                    <?= htmlspecialchars(
                        $data['nama_teknisi']
                    ) ?>

                </div>


                <div class="nik">

                    NIK.
                    <?= htmlspecialchars(
                        $data['nik']
                    ) ?>

                </div>

            </div>



            <!-- ADMIN -->

            <div class="ttd-box">

                <div class="ttd-title">
                    Admin,
                </div>


                <?php if (!empty($data['ttd_admin'])) { ?>

                    <div class="ttd-area">

                        <img
                            src="<?= htmlspecialchars($data['ttd_admin']) ?>"
                            alt="TTD Admin"
                        >

                    </div>

                <?php } else { ?>

                    <div class="ttd-kosong">
                        TTD Admin belum diisi
                    </div>

                <?php } ?>


                <div class="nama-ttd">

                    <?= !empty($data['nama_admin'])
                        ? htmlspecialchars($data['nama_admin'])
                        : 'Admin'
                    ?>

                </div>


                <div class="nik">

                    <?= !empty($data['nik_admin'])
                        ? 'NIK. ' . htmlspecialchars($data['nik_admin'])
                        : 'NIK Admin'
                    ?>

                </div>

            </div>


        </div>



        <div class="id-data">

            ID Pengembalian:
            <?= $data['id'] ?>

        </div>


    </div>



    <!-- FORM ADMIN -->

    <?php if (empty($data['ttd_admin'])) { ?>

    <div class="ttd-admin-form">

        <h3>
            ✍️ Data & Tanda Tangan Admin
        </h3>

        <p>
            Isi Nama Admin dan NIK Admin terlebih dahulu,
            kemudian buat tanda tangan digital.
        </p>


        <form
            action="simpan_ttd_admin.php"
            method="POST"
            onsubmit="return simpanTtd();"
        >

            <input
                type="hidden"
                name="id"
                value="<?= $data['id'] ?>"
            >


            <!-- NAMA ADMIN -->

            <div class="form-group">

                <label>
                    Nama Admin
                </label>

                <input
                    type="text"
                    name="nama_admin"
                    id="nama_admin"
                    placeholder="MASUKKAN NAMA ADMIN"
                    maxlength="100"
                    required
                >

            </div>


            <!-- NIK ADMIN -->

            <div class="form-group">

                <label>
                    NIK Admin
                </label>

                <input
                    type="text"
                    name="nik_admin"
                    id="nik_admin"
                    placeholder="MASUKKAN NIK ADMIN"
                    maxlength="30"
                    required
                >

            </div>


            <!-- TTD -->

            <div class="form-group">

                <label>
                    Tanda Tangan Admin
                </label>

                <canvas id="canvas"></canvas>

            </div>


            <input
                type="hidden"
                name="ttd_admin"
                id="ttd_admin"
            >


            <div class="form-buttons">

                <button
                    type="button"
                    class="btn btn-clear"
                    onclick="clearCanvas()"
                >
                    Hapus TTD
                </button>


                <button
                    type="submit"
                    class="btn btn-save"
                >
                    💾 Simpan Data & TTD Admin
                </button>

            </div>

        </form>

    </div>

    <?php } ?>


</div>



<script>

const canvas = document.getElementById("canvas");

if (canvas) {

    const ctx = canvas.getContext("2d");

    let drawing = false;


    function resizeCanvas() {

        const rect = canvas.getBoundingClientRect();

        canvas.width = rect.width;
        canvas.height = rect.height;

        ctx.lineWidth = 2;
        ctx.lineCap = "round";
        ctx.strokeStyle = "#111827";

    }


    resizeCanvas();


    window.addEventListener(
        "resize",
        resizeCanvas
    );


    function getPosition(e) {

        const rect =
            canvas.getBoundingClientRect();

        return {

            x: e.clientX - rect.left,

            y: e.clientY - rect.top

        };

    }


    canvas.addEventListener(
        "pointerdown",
        function(e) {

            drawing = true;

            const pos = getPosition(e);

            ctx.beginPath();

            ctx.moveTo(
                pos.x,
                pos.y
            );

        }
    );


    canvas.addEventListener(
        "pointermove",
        function(e) {

            if (!drawing) {
                return;
            }

            const pos = getPosition(e);

            ctx.lineTo(
                pos.x,
                pos.y
            );

            ctx.stroke();

        }
    );


    canvas.addEventListener(
        "pointerup",
        function() {

            drawing = false;

        }
    );


    canvas.addEventListener(
        "pointerleave",
        function() {

            drawing = false;

        }
    );


    window.clearCanvas = function() {

        ctx.clearRect(
            0,
            0,
            canvas.width,
            canvas.height
        );

    };


    window.simpanTtd = function() {

        const nama =
            document.getElementById("nama_admin").value.trim();

        const nik =
            document.getElementById("nik_admin").value.trim();


        if (nama === "") {

            alert("Nama Admin wajib diisi.");

            document.getElementById(
                "nama_admin"
            ).focus();

            return false;

        }


        if (nik === "") {

            alert("NIK Admin wajib diisi.");

            document.getElementById(
                "nik_admin"
            ).focus();

            return false;

        }


        const image =
            canvas.toDataURL("image/png");


        const blank =
            document.createElement("canvas");

        blank.width = canvas.width;
        blank.height = canvas.height;


        if (
            canvas.toDataURL() ===
            blank.toDataURL()
        ) {

            alert(
                "Silakan isi tanda tangan Admin terlebih dahulu."
            );

            return false;

        }


        document.getElementById(
            "ttd_admin"
        ).value = image;


        return true;

    };

}

</script>


</body>

</html>