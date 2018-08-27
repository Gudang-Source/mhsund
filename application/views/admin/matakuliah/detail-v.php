<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col-2"></div>
			<div class="col-10">
				<div class="card">
					<div class="card-body">
						<h5 class="card-title"><?php echo $title; ?></h5><hr/>
						<form>
							<div class="form-group">
								<label>Kode Matakuliah</label>
								<input type="text" class="form-control" name="kode_mk" placeholder="Kode Matakuliah" value="<?php echo $hasil->kode_mk ?>">
								<small class="form-text text-muted">huruf dan angka dapat digunakan (tanpa spasi).</small>
							</div>
							<div class="form-group">
								<label>Nama Matakuliah</label>
								<input type="text" class="form-control" name="nm_mk" placeholder="Nama Matakuliah" value="<?php echo $hasil->nm_mk ?>">
								<small class="form-text text-muted">Semua jenis karakter dapat digunakan.</small>
							</div>
							<div class="form-group">
								<label>Program Studi</label>
								<select class="form-control" name="id_sms">
									<option value="<?php echo $hasil->id_sms ?>">-- <?php echo $hasil->nm_jenj_didik.' '.$hasil->nm_lemb; ?> --</option>
									<?php foreach ($prodi as $data): ?>
										<option value="<?php echo $data->id_sms ?>"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Semua jenis karakter dapat digunakan.</small>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Bobot Matakuliah</label>
										<input type="text" class="form-control" name="sks_mk" placeholder="Bobot Matakuliah" value="<?php echo $hasil->sks_tm ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Bobot Tatap Muka</label>
										<input type="text" class="form-control" name="sks_tm" placeholder="Bobot Tatap Muka" value="<?php echo $hasil->sks_tm ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Bobot Praktikum</label>
										<input type="text" class="form-control" name="sks_prak" placeholder="Bobot Praktikum" value="<?php echo $hasil->sks_prak ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Bobot Praktikum lapangan</label>
										<input type="text" class="form-control" name="sks_prak_lap" placeholder="Bobot Praktikum Lapangan" value="<?php echo $hasil->sks_prak_lap ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label>Bobot Simulasi</label>
										<input type="text" class="form-control" name="sks_sim" placeholder="Bobot Simulasi" value="<?php echo $hasil->sks_sim ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Silabus Pembelajaran</label>
										<select class="form-control" name="a_silabus">
											<?php if ($hasil->a_silabus == 1 && $hasil->a_silabus !== 0 && $hasil->a_silabus!== NULL): ?>
												<option value="1">-- YA --</option>
												<?php else: ?>
													<option value="0">-- TIDAK --</option>
											<?php endif ?>
											<option value="1">YA</option>
											<option value="0">TIDAK</option>
										</select>
										<small class="form-text text-muted">Semua jenis karakter dapat digunakan.</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Tanggal Mulai Efektif</label>
										<input type="text" class="form-control" name="tgl_mulai_efektif" placeholder="Tanggal" value="<?php echo $hasil->tgl_mulai_efektif ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label>Tanggal Akhir Efektif</label>
										<input type="text" class="form-control" name="tgl_mulai_efektif" placeholder="Tanggal" value="<?php echo $hasil->tgl_mulai_efektif ?>">
										<small class="form-text text-muted">hanya dapat menggunakan angka.</small>
									</div>
								</div>
							</div><hr/>
							<button type="submit" name="submit" class="btn btn-success" value="submit">Simpan perubahan Matakuliah</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>