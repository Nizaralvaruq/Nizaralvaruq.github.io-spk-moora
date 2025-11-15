<h3><i class="fa fa-angle-right"></i> Hasil Perhitungan MOORA</h3>
<div class="row mb">
  <div class="content-panel">
    <div class="adv-table" style="padding: 15px;">
      <table class="display table table-bordered table-striped" id="myDataTables">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Nilai MOORA</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include 'lib/koneksi.php';
          $no = 1;
          $sql = "SELECT * FROM tabel_hasil ORDER BY nilai DESC";
          $result = mysqli_query($koneksi, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
          <tr class="gradeX">
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= round($row['nilai'], 4) ?></td>
            <td><?= date('d-m-Y', strtotime($row['tanggal'])) ?></td>
            <td>
              <?php if ($row['status'] == 'Lolos') { ?>
                <span class="badge badge-success">Lolos</span>
              <?php } else { ?>
                <span class="badge badge-danger">Tidak Lolos</span>
              <?php } ?>
            </td>
          </tr>
          <?php } ?>
          <div style="margin-bottom: 15px;">
  <a href="pages/hasil/export_hasil_excel.php" class="btn btn-success">
    <i class="fa fa-file-excel-o"></i> Export ke Excel
  </a>
  <a href="pages/hasil/export_hasil_pdf.php" class="btn btn-danger" target="_blank">
    <i class="fa fa-file-pdf-o"></i> Export ke PDF
  </a>
</div>

        </tbody>
      </table>
    </div>
  </div>
</div>
