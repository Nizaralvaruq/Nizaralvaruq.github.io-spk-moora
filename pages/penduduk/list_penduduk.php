<h3><i class="fa fa-angle-right"></i> Daftar Penduduk</h3>
<div class="row mb">
  <div class="content-panel">
    <div class="adv-table" style="padding: 15px;">
      <table class="display table table-bordered" id="myDataTables">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>Lansia</th>
            <th>Janda / Duda</th>
            <th>Kondisi Rumah</th>
            <th>Penghasilan (Rp)</th>
            <th>Terdaftar DTKS</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php
function deskripsi_lansia($skor) {
    switch ($skor) {
        case 1: return "60–69 tahun";
        case 2: return "70–79 tahun";
        case 3: return "80 tahun ke atas";
        default: return "-";
    }
}

function deskripsi_status($skor) {
    return $skor == 5 ? "Ya" : "Tidak";
}

function deskripsi_kondisi_rumah($skor) {
    switch ($skor) {
        case 3: return "Tidak Layak";
        case 2: return "Hampir Tidak Layak";
        case 1: return "Rusak Sedang";
        
        default: return "-";
    }
}

function deskripsi_penghasilan($skor) {
    switch ($skor) {
        case 5: return "< 500.000";
        case 4: return "500.000 – 1.000.000";
        case 3: return "1.000.001 – 1.500.000";
        case 2: return "1.500.001 – 2.000.000";
        case 1: return "> 2.000.000";
        default: return "-";
    }
}

function deskripsi_dtks($skor) {
    return $skor == 5 ? "Ya" : "Tidak";
}
?>

        <tbody>
<?php
$no = 1;
$sql = "SELECT * FROM tabel_penduduk ORDER BY id_penduduk ASC";
$result = mysqli_query($koneksi, $sql);
while ($row = mysqli_fetch_assoc($result)) {
?>
  <tr class="gradeX">
    <td><?= $no++ ?></td>
    <td><?= htmlspecialchars($row['nama']) ?></td>
    <td><?= ($row['jenis_kelamin'] == 'L') ? 'Laki-laki' : 'Perempuan' ?></td>
    <td><?= htmlspecialchars($row['alamat']) ?></td>
    <td><?= deskripsi_lansia($row['lansia']) ?></td>
    <td><?= deskripsi_status($row['janda']) ?></td>
    <td><?= deskripsi_kondisi_rumah($row['kondisi_rumah']) ?></td>
    <td><?= deskripsi_penghasilan($row['penghasilan']) ?></td>
    <td><?= deskripsi_dtks($row['dtks']) ?></td>
    <td>
      <a href="index.php?module=update_penduduk&id_penduduk=<?= $row['id_penduduk'] ?>" class="btn btn-warning btn-sm">
        <i class="fa fa-cog"></i> Edit
      </a>
      <a href="index.php?module=hapus_penduduk&id_penduduk=<?= $row['id_penduduk'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">
        <i class="fa fa-trash"></i> Hapus
      </a>
    </td>
  </tr>
<?php } ?>
</tbody>

      </table>
    </div>
  </div>
</div>
