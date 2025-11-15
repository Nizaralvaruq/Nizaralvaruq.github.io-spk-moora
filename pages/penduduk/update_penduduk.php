<?php
$id = $_GET['id_penduduk'];
$sql = mysqli_query($koneksi, "SELECT * FROM tabel_penduduk WHERE id_penduduk = $id");
$data = mysqli_fetch_assoc($sql);
?>

<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Data Diri</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Penilaian Kriteria</a>
  </li>
</ul>

<form class="form-horizontal style-form" method="POST" action="pages/penduduk/aksi_edit.php">
  <input type="hidden" name="id_penduduk" value="<?= $data['id_penduduk'] ?>">
  <div class="tab-content" style="background-color: white;padding: 20px;">
    <div id="home" class="tab-pane active">
      <h3>Data Diri</h3>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <label><input type="radio" name="jenis_kelamin" value="L" <?= $data['jenis_kelamin']=='L'?'checked':'' ?>> Laki-laki</label>
          <label style="margin-left: 20px;"><input type="radio" name="jenis_kelamin" value="P" <?= $data['jenis_kelamin']=='P'?'checked':'' ?>> Perempuan</label>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="alamat" rows="3" required><?= $data['alamat'] ?></textarea>
        </div>
      </div>
    </div>

    <div id="menu1" class="tab-pane fade">
      <h3>Penilaian Kriteria</h3>

      <div class="form-group">
  <label class="col-sm-2 control-label">Lansia</label>
  <div class="col-sm-10">
    <select class="form-control" name="lansia" required>
      <option value="1">60–69 tahun</option>
      <option value="2">70–79 tahun</option>
      <option value="3">80 tahun ke atas</option>
    </select>
    <small class="text-muted">Skor 1–3 sesuai umur</small>
  </div>
</div>
      <div class="form-group">
        <label class="col-sm-2 control-label">Janda / Duda</label>
        <div class="col-sm-10">
          <select class="form-control" name="janda" required>
            <option value="5" <?= $data['janda'] == 5 ? 'selected' : '' ?>>Ya</option>
            <option value="1" <?= $data['janda'] == 1 ? 'selected' : '' ?>>Tidak</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Kondisi Rumah</label>
        <div class="col-sm-10">
   <select class="form-control" name="kondisi_rumah" required>
  <option value="3" <?= $data['kondisi_rumah'] == 3 ? 'selected' : '' ?>>Tidak Layak (rusak berat, atap bocor, lantai tanah)</option>
  <option value="2" <?= $data['kondisi_rumah'] == 2 ? 'selected' : '' ?>>Hampir Tidak Layak (rusak sebagian, masih bisa dihuni)</option>
  <option value="1" <?= $data['kondisi_rumah'] == 1 ? 'selected' : '' ?>>Rusak Sedang (kerusakan ringan)</option>
</select>
<small class="text-muted">Nilai lebih tinggi menunjukkan kondisi rumah lebih memprihatinkan.</small>

        </div>
      </div>

   <!-- Penghasilan -->
<!-- Penghasilan -->
      <div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">Penghasilan (Rp)</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" name="penghasilan" min="0" required placeholder="Contoh: 750000">
    <small class="text-muted">Penghasilan akan otomatis dikonversi ke skor 1–5 sesuai rentang</small>
  </div>
</div>


      <div class="form-group">
        <label class="col-sm-2 control-label">DTKS</label>
        <div class="col-sm-10">
          <select class="form-control" name="dtks" required>
            <option value="5" <?= $data['dtks'] == 5 ? 'selected' : '' ?>>Terdaftar</option>
            <option value="1" <?= $data['dtks'] == 1 ? 'selected' : '' ?>>Tidak Terdaftar</option>
          </select>
        </div>
      </div>

      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </div>
  </div>
  <script>
  document.getElementById('input_rupiah').addEventListener('input', function () {
    let nilai = parseInt(this.value) || 0;
    let skor = 1;

    if (nilai < 500000) {
      skor = 5;
    } else if (nilai <= 1000000) {
      skor = 4;
    } else if (nilai <= 1500000) {
      skor = 3;
    } else if (nilai <= 2000000) {
      skor = 2;
    } else {
      skor = 1;
    }

    document.getElementById('penghasilan_skor').value = skor;
  });
</script>

</form>

<!-- Script konversi penghasilan ke skor -->
