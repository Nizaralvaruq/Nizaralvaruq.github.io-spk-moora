<?php
include '../../lib/koneksi.php';

// Ambil data dari form
$kriteria = $_POST['kriteria'];
$type     = $_POST['type'];
$bobot    = $_POST['bobot'];

// Validasi sederhana (opsional, sudah divalidasi di HTML)
if (empty($kriteria) || empty($type) || empty($bobot)) {
    echo "<script>
        alert('Semua field harus diisi!');
        window.location.href='../../pages/kriteria/tambah_kriteria.php';
    </script>";
    exit;
}

// Simpan ke database
$query = "INSERT INTO tabel_kriteria (kriteria, type, bobot) VALUES ('$kriteria', '$type', '$bobot')";
$result = mysqli_query($koneksi, $query);

// Cek hasil
if ($result) {
    echo "<script>
        alert('Data kriteria berhasil disimpan.');
        window.location.href='../../pages/kriteria/list_kriteria.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menyimpan data: " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}

mysqli_close($koneksi);
?>
