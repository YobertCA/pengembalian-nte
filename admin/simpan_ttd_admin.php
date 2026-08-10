<?php

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: riwayat.php");

    exit;
}


$id = intval(
    $_POST['id'] ?? 0
);

$nama_admin = trim(
    $_POST['nama_admin'] ?? ''
);

$nik_admin = trim(
    $_POST['nik_admin'] ?? ''
);

$ttd_admin = $_POST['ttd_admin'] ?? '';



/* Validasi */

if ($id <= 0) {

    die("ID pengembalian tidak valid.");

}


if ($nama_admin === '') {

    die("Nama Admin wajib diisi.");

}


if ($nik_admin === '') {

    die("NIK Admin wajib diisi.");

}


if ($ttd_admin === '') {

    die("Tanda tangan Admin wajib diisi.");

}



/* Simpan */

$stmt = mysqli_prepare(
    $conn,
    "UPDATE pengembalian
     SET nama_admin = ?,
         nik_admin = ?,
         ttd_admin = ?
     WHERE id = ?"
);


mysqli_stmt_bind_param(
    $stmt,
    "sssi",
    $nama_admin,
    $nik_admin,
    $ttd_admin,
    $id
);



if (mysqli_stmt_execute($stmt)) {

    header(
        "Location: lihat_ba.php?id=" . $id
    );

    exit;

} else {

    echo "Gagal menyimpan data Admin.";

}

?>