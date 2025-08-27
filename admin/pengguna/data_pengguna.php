	</div>
	<!-- /.card-header -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Data User</h6>
		</div>
		<div class="card-body">
			<div class="mb-3">
				<!-- Tombol "Tambah Data" dengan jarak tambahan -->
				<a href="?page=MyApp/add_pengguna" class="btn btn-primary">
					<i class="fa fa-edit"></i> Tambah Data
				</a>
			</div>
			<div class="table-responsive">
				<table class="table table-bordered text-gray-800" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama User</th>
							<th>Username</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

						<?php
						$no = 1;
						$sql = $koneksi->query("select * from tb_pengguna");
						while ($data = $sql->fetch_assoc()) {
						?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['nama_pengguna']; ?>
								</td>
								<td>
									<?php echo $data['username']; ?>
								</td>
								<td>
									<?php echo $data['level']; ?>
								</td>
								<td>
									<a href="?page=MyApp/edit_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
										title="Ubah" class="btn btn-success btn-circle btn-sm">
										<i class="bi bi-pencil-fill"></i>
									</a>
									<a href="?page=MyApp/del_pengguna&kode=<?php echo $data['id_pengguna']; ?>"
										onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" class="btn btn-danger btn-circle btn-sm">
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