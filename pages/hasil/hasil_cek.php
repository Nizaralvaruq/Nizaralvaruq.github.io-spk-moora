<?php
$mysqli = new mysqli("localhost", "root", "", "db_moora");
if ($mysqli->connect_error) {
  exit('Could not connect');
}

// Ambil tanggal terbaru
$tanggal = '';
$sql_tanggal = "SELECT tanggal FROM tabel_hasil ORDER BY tanggal DESC LIMIT 1";
$result_tanggal = $mysqli->query($sql_tanggal);
if ($result_tanggal && $row = $result_tanggal->fetch_assoc()) {
  $tanggal = $row['tanggal'];
}
?>

<table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="myDataTables">
  <thead>
    <tr>
      <th>Nama</th>
      <th>Jenis Kelamin</th>
      <th>Alamat</th>
      <th>Nilai</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($tanggal != '') {
      $sql = "SELECT 
                tabel_penduduk.nama, 
                tabel_penduduk.jenis_kelamin, 
                tabel_penduduk.alamat, 
                tabel_hasil.nilai 
              FROM tabel_hasil 
              JOIN tabel_penduduk ON tabel_hasil.nama = tabel_penduduk.nama 
              WHERE tabel_hasil.tanggal = ? 
              ORDER BY tabel_hasil.nilai DESC";

      $stmt = $mysqli->prepare($sql);
      $stmt->bind_param("s", $tanggal);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($nama, $jenis_kelamin, $alamat, $nilai);

      while ($stmt->fetch()) {
        echo "<tr class='gradeX'>
                <td>$nama</td>
                <td>$jenis_kelamin</td>
                <td>$alamat</td>
                <td>" . number_format($nilai, 4) . "</td>
              </tr>";
      }
      $stmt->close();
    } else {
      echo "<tr><td colspan='4'>Belum ada data perhitungan.</td></tr>";
    }
    ?>
  </tbody>
</table>
