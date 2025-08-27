<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	<div class="d-flex align-items-center">
		<div>
			<h4 class="alert-heading mb-1"><i class="fas fa-info-circle"></i> Pengeluaran Kas Masjid</h4>
			<p class="mb-0">Pengeluaran bulan ini:</p>
			<h5 class="text-danger font-weight-bold">
				<?php
				$bulan_ini = date('m');
				$sql = $koneksi->query("SELECT SUM(keluar) as tot_keluar FROM kas_masjid WHERE jenis='Keluar' AND MONTH(tgl_km) = '$bulan_ini'");
				while ($data = $sql->fetch_assoc()) {
					echo rupiah($data['tot_keluar']);
				}
				?>
			</h5>
			<p class="mb-0">Total Pengeluaran:</p>
			<h5 class="font-weight-bold">
				<?php
				$sql = $koneksi->query("SELECT SUM(keluar) as tot_masuk  from kas_masjid where jenis='Keluar'");
				while ($data = $sql->fetch_assoc()) {
					echo rupiah($data['tot_masuk']);
				}
				?>
			</h5>
		</div>
	</div>
</div>


<div class="card card-info">
	<!-- /.card-header -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Kas Masjid Keluar</h6>
		</div>
		<div class="card-body">
			<div class="mb-3">
				<!-- Tombol "Tambah Data" dengan jarak tambahan -->
				<a href="?page=o_add_km" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
			</div>

			<div class="table-responsive">
				<table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Tanggal</th>
							<th>Uraian</th>
							<th>Jumlah</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$sql = $koneksi->query("select * from kas_masjid where jenis='Keluar' order by tgl_km desc");
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
									<?php echo rupiah($data['keluar']); ?>
								</td>
								<td>
									<a href="?page=o_edit_km&kode=<?php echo $data['id_km']; ?>" title="Ubah" class="btn btn-success btn-circle btn-sm">
										<i class="bi bi-pencil-fill"></i>
									</a>
									<a href="?page=o_del_km&kode=<?php echo $data['id_km']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')"
										title="Hapus" class="btn btn-danger btn-circle btn-sm">
										<i class="fa fa-trash"></i>
										</>
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
		<!-- /.card-body -->