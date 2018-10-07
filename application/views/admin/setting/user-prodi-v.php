<div class="card mt-4">
	<div class="card-body">
		Daftar Akun Prodi<hr/>
		<div class="row">
			<div class="col">
				<button class="float-right btn btn-outline-dark mb-4" data-toggle="modal" data-target="#addprodi"><i class="ti ti-plus"></i> Tambah Akun Prodi</button>
			</div>
		</div>
		<table width="100%" border="1" style="font-size: 13px">
			<tr class="table-info">
				<td class="text-center p-1">No</td>
				<td class="text-center p-1">Nama</td>
				<td class="text-center p-1">Username</td>
				<td class="text-center p-1">Program Studi</td>
				<td class="text-center p-1">Status</td>
				<td class="text-center p-1" colspan="2"></td>
			</tr>
			<?php if ($hasil == FALSE): ?>
				<tr>
					<td colspan="7" class="text-center p-2">Tidak ada data ditemukan</td>
				</tr>
			<?php endif ?>
			<?php $no = $offset+1 ?>
			<?php foreach ($hasil as $data): ?>
				<tr>
					<td class="text-center p-2"><?php echo $no; ?></td>
					<td class="p-2"><?php echo $data->first_name; ?></td>
					<td class="text-center p-2"><?php echo $data->username; ?></td>
					<td class="p-2"><?php echo $data->nm_jenj_didik.' - '.$data->nm_lemb; ?></td>
					<td class="text-center p-2">
						<?php if ($data->active == 1): ?>
							<span class="text-success">Aktif</span>
							<?php else: ?>
								<span class="text-danger">Onaktif</span>
							<?php endif ?>
						</td>
						<td class="text-center p-2">
							<a href="#" class="text-info"><i class="ti ti-pencil"></i></a>
						</td>
						<td class="text-center p-2">
							<a href="#" class="text-danger"><i class="ti ti-trash"></i></a>
						</td>
					</tr>
				<?php endforeach ?>
			</table>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="addprodi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Admin Prodi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form>
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<div class="form-group">
								    <label>Nama Lengkap</label>
								    <input type="text" class="form-control" placeholder="Masukan Nama Lengkap" name="first_name" required>
								    <small class="form-text text-muted">Masukan nama tanpa gelar dan tidak menggunakan tanda titik (.)</small>
								  </div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
								    <label>Program Studi</label>
								    <select name="id_mhs" class="form-control">
								    	<?php foreach ($prodi as $data): ?>
								    		<option value="<?php echo $data->kode_prodi ?>"><?php echo $data->nm_jenj_didik.' - '.$data->nm_lemb; ?></option>
								    	<?php endforeach ?>
								    </select>
								    <small class="form-text text-muted">Masukan nama tanpa gelar dan tidak menggunakan tanda titik (.)</small>
								  </div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-outline-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>