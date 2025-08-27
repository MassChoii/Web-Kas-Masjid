<div class="card card-secondary">
  <div class="card-header">
    <h3 class="card-title"><i class="fa fa-file"></i> Laporan Kas Masjid</h3>
  </div>
  <form action="./report/kas_masjid_per.php" method="post" enctype="multipart/form-data" target="_blank" onsubmit="return validateForm()">
    <div class="card-body">

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Awal</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_1" name="tgl_1">
        </div>
      </div>

      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
        <div class="col-sm-4">
          <input type="date" class="form-control" id="tgl_2" name="tgl_2">
        </div>
      </div>

    </div>

    <div class="card-footer">
      <button type="submit" class="btn btn-info" name="btnCetak">Cetak Periode</button>
      <a href="./report/kas_masjid_full.php" class="btn btn-primary" target="_blank">Cetak Semua</a>
    </div>

  </form>
</div>

<script>
  function validateForm() {
    var tgl_1 = document.getElementById('tgl_1').value;
    var tgl_2 = document.getElementById('tgl_2').value;

    if (!tgl_1 || !tgl_2) {
      // Jika salah satu tanggal kosong, alihkan ke halaman 404
      window.location.href = '404.php'; // Ganti dengan path halaman 404 Anda
      return false; // Menghentikan form untuk dikirim
    }
    return true; // Form akan dikirim jika kedua tanggal diisi
  }
</script>
