<?php
include '../../lib/koneksi.php';


// Ambil data dari form
$nama           = $_POST['nama'];
$jenis_kelamin  = $_POST['jenis_kelamin'];
$alamat         = $_POST['alamat'];

$lansia         = $_POST['lansia'];
$janda          = $_POST['janda'];
$kondisi_rumah  = $_POST['kondisi_rumah'];
$penghasilan    = $_POST['penghasilan']; // ini nilai rupiah
$dtks           = $_POST['dtks'];

// Konversi penghasilan (rupiah) ke skor (1-5)
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

// Simpan ke database
$sql = "INSERT INTO tabel_penduduk (
            nama, 
            jenis_kelamin, 
            alamat, 
            lansia, 
            janda, 
            kondisi_rumah, 
            penghasilan, 
            dtks
        ) VALUES (
            '$nama', 
            '$jenis_kelamin', 
            '$alamat', 
            '$lansia', 
            '$janda', 
            '$kondisi_rumah', 
            '$skor_penghasilan', 
            '$dtks'
        )";

$query = mysqli_query($koneksi, $sql);

if ($query) {
    echo "<script>
        alert('Data penduduk berhasil disimpan!');
        window.location.href='../../index.php?module=list_penduduk';
    </script>";
} else {
    echo "<script>
        alert('Gagal menyimpan data!');
        window.history.back();
    </script>";
}
?>

?>
