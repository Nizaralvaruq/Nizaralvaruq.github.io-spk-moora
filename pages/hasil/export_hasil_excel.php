<?php
include "../../lib/koneksi.php";

// Header untuk download Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=hasil_perhitungan_moora.xls");

echo "<table border='1'>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nilai MOORA</th>
        <th>Tanggal</th>
        <th>Status</th>
      </tr>";

$no = 1;
$query = mysqli_query($koneksi, "SELECT * FROM tabel_hasil ORDER BY nilai DESC");
while ($row = mysqli_fetch_assoc($query)) {
    echo "<tr>
            <td>$no</td>
            <td>{$row['nama']}</td>
            <td>" . round($row['nilai'], 4) . "</td>
            <td>{$row['tanggal']}</td>
            <td>{$row['status']}</td>
          </tr>";
    $no++;
}

echo "</table>";
?>
