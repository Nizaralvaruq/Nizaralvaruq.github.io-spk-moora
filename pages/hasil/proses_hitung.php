<?php
include '../../lib/koneksi.php';

$jumlah_penerima = (int) $_POST['jumlah_penerima']; // Ambil dari input form

// Ambil data kriteria
$kriteria = [];
$bobot = [];
$type = [];
$queryKriteria = mysqli_query($koneksi, "SELECT * FROM tabel_kriteria");
while ($row = mysqli_fetch_assoc($queryKriteria)) {
    $kriteria[] = $row['kriteria'];
    $bobot[$row['kriteria']] = $row['bobot'];
    $type[$row['kriteria']] = $row['type']; // 'benefit' atau 'cost'
}

// Ambil data penduduk
$data = [];
$queryPenduduk = mysqli_query($koneksi, "SELECT * FROM tabel_penduduk");
while ($row = mysqli_fetch_assoc($queryPenduduk)) {
    $id = $row['id_penduduk'];
    foreach ($kriteria as $k) {
        $data[$id]['nilai'][$k] = $row[$k];
    }
    $data[$id]['nama'] = $row['nama'];
}

// Normalisasi
$normal = [];
foreach ($kriteria as $k) {
    $pembagi = 0;
    foreach ($data as $d) {
        $pembagi += pow($d['nilai'][$k], 2);
    }
    $pembagi = sqrt($pembagi);
    foreach ($data as $id => $d) {
        $normal[$id][$k] = ($pembagi != 0) ? $d['nilai'][$k] / $pembagi : 0;
    }
}

// Hitung Yi (MOORA)
$hasil = [];
foreach ($data as $id => $d) {
    $benefit = 0;
    $cost = 0;
    foreach ($kriteria as $k) {
        if ($type[$k] == 'benefit') {
            $benefit += $normal[$id][$k] * $bobot[$k];
        } else {
            $cost += $normal[$id][$k] * $bobot[$k];
        }
    }
    $yi = $benefit - $cost;
    $hasil[] = [
        'id_penduduk' => $id,
        'nama' => $d['nama'],
        'nilai' => $yi
    ];
}

// Urutkan dari nilai tertinggi
usort($hasil, function ($a, $b) {
    return $b['nilai'] <=> $a['nilai'];
});

// Simpan ke tabel_hasil
$tanggal = date('Y-m-d');
mysqli_query($koneksi, "DELETE FROM tabel_hasil");

foreach ($hasil as $rank => $item) {
    $status = ($rank < $jumlah_penerima) ? 'Lolos' : 'Tidak Lolos';
    mysqli_query($koneksi, "INSERT INTO tabel_hasil (nama, nilai, tanggal, status)
        VALUES (
            '{$item['nama']}',
            '{$item['nilai']}',
            '$tanggal',
            '$status')");
}

echo "<script>
    alert('Perhitungan MOORA berhasil disimpan.');
    window.location.href='../../index.php?module=list_hasil';
</script>";
?>
