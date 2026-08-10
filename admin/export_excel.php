<?php
include "koneksi.php";

/*
 * EXPORT DATA PENGEMBALIAN NTE KE EXCEL
 * File ini membuat file .xls yang bisa langsung dibuka di Microsoft Excel.
 */

$query = mysqli_query(
    $conn,
    "SELECT
        id,
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
        nama_admin,
        nik_admin,
        ttd_teknisi,
        ttd_admin,
        created_at
     FROM pengembalian
     ORDER BY id DESC"
);

if (!$query) {
    die("Gagal mengambil data: " . mysqli_error($conn));
}

/* Nama file Excel */
$filename = "Data_Pengembalian_NTE_" . date("Y-m-d") . ".xls";

/* Header download */
header("Content-Type: application/vnd.ms-excel; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"$filename\"");
header("Pragma: no-cache");
header("Expires: 0");

/* BOM agar huruf Indonesia terbaca dengan baik di Excel */
echo "\xEF\xBB\xBF";
?>

<html>
<head>
    <meta charset="UTF-8">

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th {
            background: #123b67;
            color: white;
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        td {
            border: 1px solid #000;
            padding: 7px;
        }

        .center {
            text-align: center;
        }

        .status-sudah {
            color: green;
            font-weight: bold;
        }

        .status-belum {
            color: #b45309;
            font-weight: bold;
        }
    </style>
</head>

<body>

<h2>DATA PENGEMBALIAN NTE TEKNISI</h2>

<p>
    Tanggal Export:
    <?= date("d-m-Y H:i:s") ?>
</p>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>No INC</th>
            <th>INET</th>
            <th>Nama Teknisi</th>
            <th>NIK Teknisi</th>
            <th>STO</th>
            <th>SN Lama</th>
            <th>Merk Lama</th>
            <th>SN Baru</th>
            <th>Merk Baru</th>
            <th>Keterangan</th>
            <th>Nama Admin</th>
            <th>NIK Admin</th>
            <th>TTD Teknisi</th>
            <th>TTD Admin</th>
            <th>Waktu Input</th>
        </tr>
    </thead>

    <tbody>

    <?php
    $no = 1;

    while ($data = mysqli_fetch_assoc($query)) {
    ?>

        <tr>

            <td class="center">
                <?= $no++ ?>
            </td>

            <td>
                <?= date(
                    "d-m-Y",
                    strtotime($data['tanggal'])
                ) ?>
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

            <td style="mso-number-format:'\@';">
                <?= htmlspecialchars($data['nik']) ?>
            </td>

            <td>
                <?= htmlspecialchars($data['sto']) ?>
            </td>

            <td style="mso-number-format:'\@';">
                <?= htmlspecialchars($data['sn_lama']) ?>
            </td>

            <td>
                <?= htmlspecialchars($data['merk_lama']) ?>
            </td>

            <td style="mso-number-format:'\@';">
                <?= htmlspecialchars($data['sn_baru']) ?>
            </td>

            <td>
                <?= htmlspecialchars($data['merk_baru']) ?>
            </td>

            <td>
                <?= nl2br(htmlspecialchars($data['keterangan'])) ?>
            </td>

            <td>
                <?= !empty($data['nama_admin'])
                    ? htmlspecialchars($data['nama_admin'])
                    : '-' ?>
            </td>

            <td style="mso-number-format:'\@';">
                <?= !empty($data['nik_admin'])
                    ? htmlspecialchars($data['nik_admin'])
                    : '-' ?>
            </td>

            <td class="center">
                <?= !empty($data['ttd_teknisi'])
                    ? 'SUDAH'
                    : 'BELUM' ?>
            </td>

            <td class="center">
                <?= !empty($data['ttd_admin'])
                    ? 'SUDAH'
                    : 'BELUM' ?>
            </td>

            <td>
                <?= !empty($data['created_at'])
                    ? date(
                        "d-m-Y H:i:s",
                        strtotime($data['created_at'])
                    )
                    : '-' ?>
            </td>

        </tr>

    <?php } ?>

    </tbody>
</table>

</body>
</html>