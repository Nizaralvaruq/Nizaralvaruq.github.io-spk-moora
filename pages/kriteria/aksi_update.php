<?php
include '../../lib/koneksi.php';

$id_kriteria = $_GET['id_kriteria'];
$kriteria = $_POST['kriteria'];
$type = $_POST['type'];
$bobot = $_POST['bobot'] / 100; // ubah ke desimal

$query = "UPDATE tabel_kriteria 
          SET kriteria = '$kriteria', type = '$type', bobot = '$bobot' 
          WHERE id_kriteria = '$id_kriteria'";

if (mysqli_query($koneksi, $query)) {
    echo "<script>
        alert('Data kriteria berhasil diperbarui.');
        window.location.href = '../../index.php?module=list_kriteria';
    </script>";
} else {
    echo "Gagal update data: " . mysqli_error($koneksi);
}
?>
