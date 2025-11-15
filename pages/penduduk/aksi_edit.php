<?php
include '../../lib/koneksi.php';

// Ambil data dari form
$id_penduduk   = $_POST['id_penduduk'];
$nama          = $_POST['nama'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$alamat        = $_POST['alamat'];
$lansia        = $_POST['lansia'];
$janda         = $_POST['janda'];
$kondisi_rumah = $_POST['kondisi_rumah'];
$penghasilan   = $_POST['penghasilan']; // ini nilai RUPIAH
$dtks          = $_POST['dtks'];

// Konversi penghasilan rupiah ke skor 1–5
if ($penghasilan < 500000) {
    $skor_penghasilan = 5;
} elseif ($penghasilan <= 1000000) {
    $skor_penghasilan = 4;
} elseif ($penghasilan <= 1500000) {
    $skor_penghasilan = 3;
} elseif ($penghasilan <= 2000000) {
    $skor_penghasilan = 2;
} else {
    $skor_penghasilan = 1;
}

// Jalankan UPDATE
$sql = "UPDATE tabel_penduduk SET
            nama = '$nama',
            jenis_kelamin = '$jenis_kelamin',
            alamat = '$alamat',
            lansia = '$lansia',
            janda = '$janda',
            kondisi_rumah = '$kondisi_rumah',
            penghasilan = '$skor_penghasilan',
            dtks = '$dtks'
        WHERE id_penduduk = '$id_penduduk'";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>
        alert('Data penduduk berhasil diperbarui!');
        window.location.href='../../index.php?module=list_penduduk';
    </script>";
} else {
    echo "<script>
        alert('Gagal menyimpan data! " . mysqli_error($koneksi) . "');
        window.history.back();
    </script>";
}
?>
