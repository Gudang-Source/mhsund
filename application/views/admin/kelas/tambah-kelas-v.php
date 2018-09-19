<div class="card mt-4">
	<div class="card-body">
		<form>
			<div class="form-group">
				<label>Program Studi</label>
				<select class="form-control" name="id_sms">
					<?php foreach ($prodi as $data): ?>
						<option value="<?php echo $data->id_sms ?>"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Matakuliah</label>
						<input type="text" class="form-control" placeholder="Pilh Matakuliah">
						<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Semester</label>
						<select class="form-control" name="id_sms">
							<?php foreach ($semester as $data): ?>
								<option value="<?php echo $data->id_smt ?>"><?php echo $data->id_smt.' - '.$data->nm_smt; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type="text" class="form-control" placeholder="Masukan Nama Kelas">
				<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
			</div>
			<div class="form-group">
				<label>Bahasan</label>
				<textarea class="form-control" placeholder="Masukan bahasan"></textarea>
				<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Tanggal Mullai</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Kelas" value="<?php echo date('Y-m-d') ?>">
						<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Tanggal Selesai</label>
						<input type="text" class="form-control" placeholder="Masukan Nama Kelas">
						<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button class="btn btn-success mt-4"><i class="ti ti-plus"></i> Buat kelas</button>
		</form>
	</div>
</div>