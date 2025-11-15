<?php
$sql = "DELETE FROM tabel_penduduk WHERE id_penduduk='$_GET[id_penduduk]'";
if ($koneksi->query($sql) === TRUE) {
    echo "<script>alert('HAPUS berhasil');window.location = 'index.php?module=list_penduduk';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
?>