<?php

include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $tanggal       = $_POST['tanggal'];
    $no_inc        = strtoupper(trim($_POST['no_inc']));
    $inet          = strtoupper(trim($_POST['inet']));
    $nama_teknisi  = strtoupper(trim($_POST['nama_teknisi']));
    $nik           = strtoupper(trim($_POST['nik']));
    $sto           = strtoupper(trim($_POST['sto']));
    $sn_lama       = strtoupper(trim($_POST['sn_lama']));
    $merk_lama     = strtoupper(trim($_POST['merk_lama']));
    $sn_baru       = strtoupper(trim($_POST['sn_baru']));
    $merk_baru     = strtoupper(trim($_POST['merk_baru']));
    $keterangan    = strtoupper(trim($_POST['keterangan']));
    $ttd_teknisi   = $_POST['ttd_teknisi'];

    // TTD ADMIN masih kosong
    $ttd_admin = null;

    $sql = "INSERT INTO pengembalian (
                tanggal,
                no_inc,
                inet,
                nama_teknisi,
                nik,
                sto,
                sn_lama,
                merk_lama,
                sn_baru,
                merk_baru,
                keterangan,
                ttd_teknisi,
                ttd_admin
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {

        mysqli_stmt_bind_param(
            $stmt,
            "sssssssssssss",
            $tanggal,
            $no_inc,
            $inet,
            $nama_teknisi,
            $nik,
            $sto,
            $sn_lama,
            $merk_lama,
            $sn_baru,
            $merk_baru,
            $keterangan,
            $ttd_teknisi,
            $ttd_admin
        );

        if (mysqli_stmt_execute($stmt)) {

            $id = mysqli_insert_id($conn);

            mysqli_stmt_close($stmt);

            ?>

            <!DOCTYPE html>
            <html lang="id">
            <head>

                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>Berhasil Disimpan</title>

                <style>

                    * {
                        box-sizing: border-box;
                        font-family: Arial, Helvetica, sans-serif;
                    }

                    body {
                        margin: 0;
                        background: #f4f6f9;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                    }

                    .box {
                        width: 450px;
                        background: white;
                        border-radius: 15px;
                        padding: 40px;
                        text-align: center;
                        border: 1px solid #e5e7eb;
                        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
                    }

                    .icon {
                        font-size: 55px;
                        margin-bottom: 15px;
                    }

                    h2 {
                        margin-bottom: 10px;
                        color: #123b67;
                    }

                    p {
                        color: #6b7280;
                        line-height: 1.6;
                    }

                    .id {
                        background: #f3f6fa;
                        padding: 12px;
                        border-radius: 8px;
                        margin: 20px 0;
                        font-weight: bold;
                    }

                    .buttons {
                        display: flex;
                        justify-content: center;
                        gap: 10px;
                        margin-top: 25px;
                    }

                    a {
                        text-decoration: none;
                        padding: 12px 18px;
                        border-radius: 8px;
                        font-size: 14px;
                        font-weight: bold;
                    }

                    .primary {
                        background: #123b67;
                        color: white;
                    }

                    .secondary {
                        background: #eef2f7;
                        color: #123b67;
                    }

                </style>

            </head>

            <body>

                <div class="box">

                    <div class="icon">✅</div>

                    <h2>Data Berhasil Disimpan</h2>

                    <p>
                        Data pengembalian berhasil disimpan
                        ke dalam database.
                    </p>

                    <div class="id">
                        ID Pengembalian: #<?= $id ?>
                    </div>

                    <div class="buttons">

                        <a href="pengembalian.php" class="secondary">
                            ↩ Kembali
                        </a>

                        <a href="download_ba.php?id=<?= $id ?>" class="primary">
                            📄 Lihat BA
                        </a>

                    </div>

                </div>

            </body>
            </html>

            <?php

        } else {

            echo "Data gagal disimpan: " . mysqli_stmt_error($stmt);

            mysqli_stmt_close($stmt);
        }

    } else {

        echo "Query gagal dibuat: " . mysqli_error($conn);
    }

} else {

    header("Location: pengembalian.php");
    exit;

}

?>