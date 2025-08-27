<?php
$sql = $koneksi->query("SELECT SUM(masuk) as tot_masuk  from kas_masjid where jenis='Masuk'");
while ($data = $sql->fetch_assoc()) {
	$masuk = $data['tot_masuk'];
}
?>

<?php
$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar  from kas_masjid where jenis='Keluar'");
while ($data = $sql->fetch_assoc()) {
	$keluar = $data['tot_keluar'];
}
?>

<div class="alert alert-info alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<div class="d-flex align-items-center">
		<div>
			<h4 class="alert-heading mb-1"><i class="fas fa-info-circle"></i> Saldo Kas Masjid</h4>
			<p class="mb-0">Pemasukan:</p>
			<h5 class="text-info font-weight-bold">
				<?php echo rupiah($masuk); ?>
			</h5>

			<p class="mb-0">Pengeluaran:</p>
			<h5 class="text-danger font-weight-bold">
				<?php echo rupiah($keluar); ?>
			</h5>
			<hr>

			<h3 class="font-weight-bold">Saldo Akhir:</h3>
			<h4 class="font-weight-bold">
				<?php
				$saldo = $masuk - $keluar;
				echo rupiah($saldo);
				?>
			</h4>
		</div>
	</div>
</div>


<div class="card card-primary">
	<!-- /.card-header -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Rekapitulasi Kas Masjid</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Uraian</th>
							<th>Pemasukan</th>
							<th>Pengeluaran</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = $koneksi->query("select * from kas_masjid order by tgl_km asc");
						while ($data = $sql->fetch_assoc()) {
						?>
							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php $tgl = $data['tgl_km'];
									echo date("d/M/Y", strtotime($tgl)) ?>
								</td>
								<td>
									<?php echo $data['uraian_km']; ?>
								</td>
								<td align="right">
									<?php echo rupiah($data['masuk']); ?>
								</td>
								<td align="right">
									<?php echo rupiah($data['keluar']); ?>
								</td>
							</tr>
						<?php
						}
						?>
					</tbody>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>