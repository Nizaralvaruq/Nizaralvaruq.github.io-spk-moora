<?php
require '../../vendor/autoload.php';
use Dompdf\Dompdf;

include "../../lib/koneksi.php";

// Ambil data hasil
$query = mysqli_query($koneksi, "SELECT * FROM tabel_hasil ORDER BY nilai DESC");

$tanggal = date("d-m-Y");
$html = '
<style>
  body { font-family: Arial, sans-serif; font-size: 12px; }
  table { border-collapse: collapse; width: 100%; margin-top: 20px; }
  th, td { border: 1px solid #000; padding: 6px; text-align: center; }
  h2 { text-align: center; }
  .ttd { margin-top: 50px; width: 100%; text-align: right; }
</style>

<h2>LAPORAN HASIL PERHITUNGAN </h2>
<p>Tanggal Cetak: ' . $tanggal . '</p>

<table>
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Nilai MOORA</th>
      <th>Tanggal</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>';

$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
  $html .= "<tr>
    <td>{$no}</td>
    <td>{$row['nama']}</td>
    <td>" . round($row['nilai'], 4) . "</td>
    <td>" . date('d-m-Y', strtotime($row['tanggal'])) . "</td>
    <td>{$row['status']}</td>
  </tr>";
  $no++;
}

$html .= '
  </tbody>
</table>

<div class="ttd">
  <p>Desa Nambakan, ' . $tanggal . '</p>
  <br><br><br>
  <p><strong>Kepala Desa Nambakan</strong></p>
  <p style="margin-top:60px;">(_______________________)</p>
</div>';

// Render PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("laporan_moora.pdf", ["Attachment" => false]);
?>
