<div class="card mt-4">
	<div class="card-body">
		Detail Admin Prodi <hr/>
		<form action="<?php echo base_url('index.php/admin/mahasiswa/proses_edit_akun') ?>" method="post">
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label for="first_name">Nama Depan</label>
						<input type="hidden" name="id" value="<?php echo $akun->id ?>">
						<div class="form-control"><?php echo $akun->first_name ?></div>
						<small id="first_name" class="form-text text-muted">tidak dapat di edit</small>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label for="username">Username</label>
				<div class="form-control"><?php echo $akun->username ?></div>
				<small id="first_name" class="form-text text-muted">tidak dapat di edit</small>
			</div>
			<div class="form-group">
				<label for="password">Password Saat Ini</label>
				<div class="form-control border border-success text-success"><?php echo $akun->repassword; ?></div>
				<small id="password" class="form-text text-muted">Password saat ini yang sedang digunakan</small>
			</div>
			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="*******">
				<small id="password" class="form-text text-muted">Minimal 8 karakter atau lebih menggunakan kombinasi huruf dan angka</small>
			</div>
			<div class="form-group">
				<label for="repassword">Ulangi Password</label>
				<input type="password" class="form-control" name="repassword" id="repassword" placeholder="*******">
				<small id="repassword" class="form-text text-muted">Masukan ulang password anda diatas</small>
			</div>

			<button type="submit" class="btn btn-success">Simpan</button>
		</form>
	</div>
</div>