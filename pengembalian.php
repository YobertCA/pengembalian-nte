<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Pengembalian - Teknisi</title>

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

        .form-container {
            background: white;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            padding: 30px;
            max-width: 1100px;
        }

        .form-header {
            margin-bottom: 25px;
        }

        .form-header h1 {
            font-size: 26px;
            margin-bottom: 8px;
        }

        .form-header p {
            color: #6b7280;
            font-size: 14px;
        }

        /* NOTE */
        .note {
            background: #fff8e1;
            border: 1px solid #f3d47a;
            padding: 14px 16px;
            border-radius: 9px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #795b00;
        }

        .note strong {
            color: #604900;
        }

        /* FORM */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 13px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            text-transform: uppercase;
        }

        input:focus,
        textarea:focus {
            border-color: #123b67;
            box-shadow: 0 0 0 3px rgba(18, 59, 103, 0.08);
        }

        input[type="date"] {
            text-transform: none;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* NTE */
        .nte-box {
            margin-top: 10px;
            padding: 22px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
        }

        .nte-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 18px;
        }

        .nte-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        /* SIGNATURE */
        .signature-box {
            margin-top: 10px;
        }

        .signature-area {
            width: 100%;
            max-width: 600px;
            height: 220px;
            border: 2px dashed #b8c4d1;
            border-radius: 10px;
            background: #fafafa;
            position: relative;
            overflow: hidden;
        }

        #signatureCanvas {
            width: 100%;
            height: 100%;
            cursor: crosshair;
        }

        .signature-info {
            margin-top: 8px;
            color: #6b7280;
            font-size: 12px;
        }

        .btn-clear {
            margin-top: 10px;
            padding: 9px 15px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 7px;
            cursor: pointer;
        }

        .btn-clear:hover {
            background: #f3f4f6;
        }

        /* BUTTON */
        .form-actions {
            margin-top: 30px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn {
            padding: 12px 22px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-save {
            background: #123b67;
            color: white;
        }

        .btn-save:hover {
            background: #0e2e51;
        }

        @media (max-width: 800px) {
            .sidebar {
                width: 210px;
            }

            .content {
                margin-left: 210px;
            }

            .form-grid,
            .material-grid {
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

        <a href="pengembalian.php" class="active">
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

    <div class="topbar">

        <h3>Pengembalian</h3>

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

        <div class="form-container">

            <div class="form-header">

                <h1>Form Pengembalian</h1>

                <p>
                    Silakan isi data pengembalian NTE dengan lengkap.
                </p>

            </div>


            <!-- NOTE -->
            <div class="note">

                ⚠️ <strong>PERHATIAN:</strong>
                Semua data yang diisi wajib menggunakan
                <strong>HURUF BESAR / KAPITAL.</strong>

                Contoh:
                <strong>BUDI, STO BOGOR, ZTE, ABC123.</strong>

            </div>


            <form action="simpan_pengembalian.php" method="POST"
                  onsubmit="return prepareSignature();">

                <div class="form-grid">

                    <!-- TANGGAL -->
                    <div class="form-group">

                        <label>Tanggal</label>

                        <input
                            type="date"
                            name="tanggal"
                            required
                        >

                    </div>


                    <!-- NO INC -->
                    <div class="form-group">

                        <label>No INC</label>

                        <input
                            type="text"
                            name="no_inc"
                            placeholder="CONTOH: INC123456"
                            required
                        >

                    </div>


                    <!-- INET -->
                    <div class="form-group">

                        <label>INET</label>

                        <input
                            type="text"
                            name="inet"
                            placeholder="MASUKKAN NOMOR INET"
                            required
                        >

                    </div>


                    <!-- NAMA TEKNISI -->
                    <div class="form-group">

                        <label>Nama Teknisi</label>

                        <input
                            type="text"
                            name="nama_teknisi"
                            placeholder="NAMA TEKNISI"
                            required
                        >

                    </div>


                    <!-- NIK -->
                    <div class="form-group">

                        <label>NIK</label>

                        <input
                            type="text"
                            name="nik"
                            placeholder="NIK TEKNISI"
                            required
                        >

                    </div>


                    <!-- STO -->
                    <div class="form-group">

                        <label>STO</label>

                        <input
                            type="text"
                            name="sto"
                            placeholder="CONTOH: STO BOGOR"
                            required
                        >

                    </div>


                    <!-- NTE LAMA -->
                    <div class="form-group full">

                        <div class="nte-box">

                            <div class="nte-title">
                                NTE LAMA
                            </div>

                            <div class="nte-grid">

                                <div class="form-group">

                                    <label>SN Lama</label>

                                    <input
                                        type="text"
                                        name="sn_lama"
                                        placeholder="SERIAL NUMBER LAMA"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>Merk Lama</label>

                                    <input
                                        type="text"
                                        name="merk_lama"
                                        placeholder="MERK NTE LAMA"
                                        required
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- MATERIAL BARU -->
                    <div class="form-group full">

                        <div class="nte-box">

                            <div class="nte-title">
                                NTE BARU
                            </div>

                            <div class="nte-grid">

                                <div class="form-group">

                                    <label>SN Baru</label>

                                    <input
                                        type="text"
                                        name="sn_baru"
                                        placeholder="SERIAL NUMBER BARU"
                                        required
                                    >

                                </div>


                                <div class="form-group">

                                    <label>Merk Baru</label>

                                    <input
                                        type="text"
                                        name="merk_baru"
                                        placeholder="MERK NTE BARU"
                                        required
                                    >

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- KETERANGAN -->
                    <div class="form-group full">

                        <label>Keterangan</label>

                        <textarea
                            name="keterangan"
                            placeholder="MASUKKAN KETERANGAN"
                        ></textarea>

                    </div>


                    <!-- TTD -->
                    <div class="form-group full">

                        <label>Tanda Tangan Teknisi</label>

                        <div class="signature-box">

                            <div class="signature-area">

                                <canvas id="signatureCanvas"></canvas>

                            </div>

                            <div class="signature-info">

                                Silakan tanda tangan menggunakan mouse,
                                touchpad, atau layar sentuh.

                            </div>

                            <button
                                type="button"
                                class="btn-clear"
                                onclick="clearSignature()"
                            >
                                Hapus Tanda Tangan
                            </button>

                        </div>

                        <input
                            type="hidden"
                            name="ttd_teknisi"
                            id="ttd_teknisi"
                        >

                    </div>

                </div>


                <!-- BUTTON -->
                <div class="form-actions">

                    <button
                        type="submit"
                        class="btn btn-save"
                    >
                        💾 SIMPAN PENGEMBALIAN
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

    const canvas = document.getElementById("signatureCanvas");
    const ctx = canvas.getContext("2d");

    let drawing = false;


    function resizeCanvas() {

        const rect = canvas.getBoundingClientRect();

        canvas.width = rect.width;
        canvas.height = rect.height;

        ctx.lineWidth = 2;
        ctx.lineCap = "round";
        ctx.lineJoin = "round";

    }

    resizeCanvas();

    window.addEventListener("resize", resizeCanvas);


    function getPosition(e) {

        const rect = canvas.getBoundingClientRect();

        if (e.touches) {

            return {
                x: e.touches[0].clientX - rect.left,
                y: e.touches[0].clientY - rect.top
            };

        }

        return {
            x: e.clientX - rect.left,
            y: e.clientY - rect.top
        };

    }


    function startDrawing(e) {

        drawing = true;

        const pos = getPosition(e);

        ctx.beginPath();

        ctx.moveTo(pos.x, pos.y);

        e.preventDefault();

    }


    function draw(e) {

        if (!drawing) return;

        const pos = getPosition(e);

        ctx.lineTo(pos.x, pos.y);

        ctx.stroke();

        e.preventDefault();

    }


    function stopDrawing() {

        drawing = false;

        ctx.closePath();

    }


    canvas.addEventListener("mousedown", startDrawing);
    canvas.addEventListener("mousemove", draw);
    canvas.addEventListener("mouseup", stopDrawing);
    canvas.addEventListener("mouseleave", stopDrawing);

    canvas.addEventListener("touchstart", startDrawing);
    canvas.addEventListener("touchmove", draw);
    canvas.addEventListener("touchend", stopDrawing);


    function clearSignature() {

        ctx.clearRect(
            0,
            0,
            canvas.width,
            canvas.height
        );

    }


    function prepareSignature() {

        const data = canvas.toDataURL("image/png");

        document.getElementById("ttd_teknisi").value = data;

        return true;

    }

</script>

</body>
</html>