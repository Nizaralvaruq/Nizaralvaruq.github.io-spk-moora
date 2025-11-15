<div class="form-panel">
  <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Kriteria</h4>
  <form class="form-horizontal style-form" method="POST" action="pages/kriteria/aksi_tambah.php">
    
    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Nama Kriteria</label>
      <div class="col-sm-10">
        <input type="text" class="form-control round-form" name="kriteria" required autofocus>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 col-sm-2 control-label">Type Kriteria</label>
      <div class="col-sm-10">
        <label class="form-check-inline">
          <input type="radio" class="form-check-input" name="type" value="benefit" checked required> Benefit
        </label>
        <label class="form-check-inline">
          <input type="radio" class="form-check-input" name="type" value="cost" required> Cost
        </label>
      </div>
    </div>

    <div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Bobot Kriteria (%)</label>
<div class="col-sm-10">
  <input type="number" name="bobot" class="form-control round-form" min="0" max="100" step="0.1" placeholder="Contoh: 25.5">
</div>

    </div>

    <div class="form-group text-center">
      <button type="submit" class="btn btn-theme03">Masukan</button>
      <button type="reset" class="btn btn-theme04">Reset</button>
    </div>
    
  </form>
</div>
