<ul class="nav nav-tabs" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#home">Data Diri</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#menu1">Penilaian Kriteria</a>
  </li>
</ul>

<form class="form-horizontal style-form" method="POST" action="pages/penduduk/aksi_tambah.php">
  <div class="tab-content" style="background-color: white;padding: 20px;">
    <div id="home" class="tab-pane active">
      <h3>Data Diri</h3>
      <div class="form-group">
        <label class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="nama" required>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Jenis Kelamin</label>
        <div class="col-sm-10">
          <label><input type="radio" name="jenis_kelamin" value="L" required> Laki-laki</label>
          <label style="margin-left: 20px;"><input type="radio" name="jenis_kelamin" value="P"> Perempuan</label>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Alamat</label>
        <div class="col-sm-10">
          <textarea class="form-control" name="alamat" rows="3" required></textarea>
        </div>
      </div>
    </div>

    <div id="menu1" class="tab-pane fade">
      <h3>Penilaian Kriteria</h3>

      <!-- Lansia -->
      <!-- Lansia -->
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


      <!-- Janda/Duda -->
      <div class="form-group">
        <label class="col-sm-2 control-label">Janda / Duda</label>
        <div class="col-sm-10">
          <select class="form-control" name="janda" required>
            <option value="5">Janda / Duda</option>
           <option value="1">Tidak</option>
 
          </select>
          <small class="text-muted">Ya = 5, Tidak = 1</small>
        </div>
      </div>

      <!-- Kondisi Rumah -->
      <div class="form-group">
        <label class="col-sm-2 control-label">Kondisi Rumah</label>
        <div class="col-sm-10">
          <select class="form-control" name="kondisi_rumah" required>
  <option value="3">Tidak Layak (Atap bocor, lantai tanah, dinding bambu/rusak parah)</option>
  <option value="2">Hampir Tidak Layak (Atap rusak sebagian, lantai semen kasar, dinding retak)</option>
  <option value="1">Rusak Sedang (Kerusakan ringan, masih bisa dihuni)</option>
</select>
<small class="text-muted">Semakin tinggi nilainya, semakin tidak layak rumahnya.</small>

        </div>
      </div>

      <!-- Penghasilan -->
      <div class="form-group">
  <label class="col-sm-2 col-sm-2 control-label">Penghasilan (Rp)</label>
  <div class="col-sm-10">
    <input type="number" class="form-control" name="penghasilan" min="0" required placeholder="Contoh: 750000">
    <small class="text-muted">Penghasilan akan otomatis dikonversi ke skor 1–5 sesuai rentang</small>
  </div>
</div>

      <!-- DTKS -->
      <div class="form-group">
        <label class="col-sm-2 control-label">DTKS</label>
        <div class="col-sm-10">
          <select class="form-control" name="dtks" required>
            <option value="5">Terdaftar</option>
            <option value="1">Tidak Terdaftar</option>
          </select>
          <small class="text-muted">Terdaftar di DTKS = 5, Tidak = 1</small>
        </div>
      </div>

      <!-- Tombol -->
      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
    </div>
  </div>
</form>
