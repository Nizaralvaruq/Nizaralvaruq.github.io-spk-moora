<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml('<h1>PDF berhasil dibuat!</h1><p>Selamat, Dompdf jalan dengan baik!</p>');
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("contoh.pdf", ["Attachment" => false]);
?>
