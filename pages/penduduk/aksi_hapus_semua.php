<?php
$sql = "DELETE FROM tabel_penduduk";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('HAPUS berhasil');window.location = 'index.php?module=list_penduduk';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>