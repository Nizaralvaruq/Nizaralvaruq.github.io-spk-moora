

<h3><i class="fa fa-angle-right"></i> Proses Perhitungan MOORA</h3>
<div class="row mb">
  <div class="col-md-12">
    <div class="content-panel shadow-sm" style="padding: 25px; border-radius: 10px; background: #f9f9f9;">
      <form action="pages/hasil/proses_hitung.php" method="POST">
        <div class="form-group">
          <label for="jumlah_penerima" class="font-weight-bold">
            <i class="fa fa-users"></i> Jumlah Penerima (Ranking Tertinggi)
          </label>
          <input 
            type="number" 
            name="jumlah_penerima" 
            id="jumlah_penerima" 
            class="form-control" 
            required 
            min="1"
            placeholder="Masukkan Jumlah Penerima Bantuan">
        </div>

        <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Hitung</button>
        <button type="reset" class="btn btn-secondary">Reset</button>
      </div>
      </form>
    </div>
  </div>
</div>
