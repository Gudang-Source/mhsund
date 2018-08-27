<div class="card mt-4">
	<div class="card-header">
		<ul class="nav nav-tabs card-header-tabs" role="tablist">
			<li role="presentation" class="nav-item active"><a href="#1" class="nav-link text-info active" aria-controls="home" role="tab" data-toggle="tab">Satuan Pendidian</a></li>
			<li role="presentation" class="nav-item "><a href="#2" class="nav-link text-info" aria-controls="home" role="tab" data-toggle="tab">Alamat Satuan Pendidian</a></li>
			<li role="presentation" class="nav-item"><a href="#3" class="nav-link text-info" aria-controls="profile" role="tab" data-toggle="tab">Akta Satuan Pendidikan</a></li>
			<li role="presentation" class="nav-item"><a href="#4" class="nav-link text-info" aria-controls="messages" role="tab" data-toggle="tab">Database Lokal</a></li>
		</ul>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col">
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade show active" id="1">
						<div class="card mb-4">
							<div class="card-body">
								<label>ID Satuan Pendidikan</label>
								<div class="text-success"><?php echo $hasil->id_sp; ?></div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<div class="form-group">
									<label>Nama Satuan Pendidikan</label>
									<input type="text" class="form-control" name="nm_lemb" placeholder="Nama Satuan Pendidikan" value="<?php echo $hasil->nm_lemb ?>">
									<small class="form-text text-muted">Nama Satuan pendidikan dapat menggunakan gabungan abjad dan angka</small>
								</div>
							</div>
							<div class="col">
								<div class="form-group">
									<label>NPSN</label>
									<input type="text" class="form-control" name="npsn" placeholder="NPSN" value="<?php echo $hasil->npsn ?>">
									<small class="form-text text-muted">Kode Satuan Pendidikan, hanya dapat menggunakan angka</small>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<?php if ($hasil->nss == NULL): ?>
									<div class="form-group">
										<label class="text-danger">NSS</label>
										<input type="text" class="form-control border border-danger" name="nss" placeholder="NPSN" value="<?php echo $hasil->nss ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>NSS</label>
											<input type="text" class="form-control" name="nss" placeholder="NPSN" value="<?php echo $hasil->nss ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
								<?php endif ?>
							</div>
							<div class="col">
								<?php if ($hasil->nm_singkat == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Nama Singkatan</label>
										<input type="text" class="form-control border border-danger" name="nm_singkat" placeholder="Nama Singkatan" value="<?php echo $hasil->nm_singkat ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>Nama Singkatan</label>
											<input type="text" class="form-control" name="nm_singkat" placeholder="Nama Singkatan Satuan Pendidikan" value="<?php echo $hasil->nm_singkat ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
								<?php endif ?>
							</div>
						</div>
						<?php if ($hasil->email == NULL): ?>
							<div class="form-group">
								<label class="text-danger">Alamat Email</label>
								<input type="email" class="form-control border border-danger" name="email" placeholder="Alamat Email" value="<?php echo $hasil->email ?>">
								<small class="form-text text-danger">data kosong, belum diisi</small>
							</div>
							<?php else: ?>
								<div class="form-group">
									<label>ALamat Email</label>
									<input type="email" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo $hasil->email ?>">
									<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
								</div>
							<?php endif ?>
						<div class="row">
							<div class="col">
								<?php if ($hasil->no_tel == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Nomor Telepon</label>
										<input type="text" class="form-control border border-danger" name="no_tel" placeholder="Nomor Telepon" value="<?php echo $hasil->no_tel ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>Nomor Telepon</label>
											<input type="text" class="form-control" name="no_tel" placeholder="Nomor Telepon" value="<?php echo $hasil->no_tel ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
									<?php endif ?>
							</div>
							<div class="col">
								<?php if ($hasil->no_fax == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Nomor Fax</label>
										<input type="text" class="form-control border border-danger" name="no_fax" placeholder="Nomor Fax" value="<?php echo $hasil->no_fax ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>Nomor Fax</label>
											<input type="text" class="form-control" name="no_fax" placeholder="Nomor Fax" value="<?php echo $hasil->no_fax ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
									<?php endif ?>
							</div>
						</div>
						<?php if ($hasil->website == NULL): ?>
							<div class="form-group">
								<label class="text-danger">Alamat Website</label>
								<input type="text" class="form-control border border-danger" name="website" placeholder="Alamat Website" value="<?php echo $hasil->website ?>">
								<small class="form-text text-danger">data kosong, belum diisi</small>
							</div>
							<?php else: ?>
								<div class="form-group">
									<label>Alamat Website</label>
									<input type="text" class="form-control" name="website" placeholder="Alamat Website" value="<?php echo $hasil->website ?>">
									<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
								</div>
							<?php endif ?>
							<div class="row">
								<div class="col">
									<?php if ($hasil->no_rek == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Nomor Rekening</label>
										<input type="text" class="form-control border border-danger" name="no_rek" placeholder="Nomor Rekening" value="<?php echo $hasil->no_rek ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>Nomor Rekening</label>
											<input type="text" class="form-control" name="no_rek" placeholder="Nomor Rekening" value="<?php echo $hasil->no_rek ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
									<?php endif ?>
								</div>
								<div class="col">
									<?php if ($hasil->nm_bank == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Nama Bank</label>
										<input type="text" class="form-control border border-danger" name="nm_bank" placeholder="Nama Bank" value="<?php echo $hasil->nm_bank ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>Nama Bank</label>
											<input type="text" class="form-control" name="nm_bank" placeholder="Nama Bank" value="<?php echo $hasil->nm_bank ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
									<?php endif ?>
								</div>
							</div>
					</div>
					<div role="tabpanel" class="tab-pane fade show" id="2">
						<?php if ($hasil->jln == NULL): ?>
							<div class="form-group">
								<label class="text-danger">Nama Jalan Satuan Pendidikan</label>
								<textarea class="form-control border border-danger" placeholder="Nama Jalan Satuan Pendidikan" name="jln"></textarea>
								<small class="form-text text-danger">data kosong, belum diisi</small>
							</div>
							<?php else: ?>
								<div class="form-group">
									<label>Nama Jalan Satuan Pendidikan</label>
									<textarea class="form-control" placeholder="Nama Jalan Satuan Pendidikan" name="jln"><?php echo $hasil->jln; ?></textarea>
									<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
								</div>
							<?php endif ?>
							<!-- rt rw -->
							<div class="row">
								<div class="col">
									<?php if ($hasil->rt == NULL): ?>
										<div class="form-group">
											<label class="text-danger">RT</label>
											<input type="text" class="form-control border border-danger" name="rt" placeholder="RT" value="<?php echo $hasil->rt ?>">
											<small class="form-text text-danger">data kosong, belum diisi</small>
										</div>
										<?php else: ?>
											<div class="form-group">
												<label>RT</label>
												<input type="text" class="form-control" name="rt" placeholder="RT" value="<?php echo $hasil->rt ?>">
												<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
											</div>
										<?php endif ?>
								</div>
								<div class="col">
									<?php if ($hasil->rw == NULL): ?>
									<div class="form-group">
										<label class="text-danger">RW</label>
										<input type="text" class="form-control border border-danger" name="rw" placeholder="RW" value="<?php echo $hasil->rw ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>RW</label>
											<input type="text" class="form-control" name="rw" placeholder="RW" value="<?php echo $hasil->rw ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
								<?php endif ?>
								</div>
							</div>
							<!--nm dusun kel -->
							<div class="row">
								<div class="col">
									<?php if ($hasil->nm_dsn == NULL): ?>
										<div class="form-group">
											<label class="text-danger">NM Dusun</label>
											<input type="text" class="form-control border border-danger" name="nm_dsn" placeholder="NM Dusun">
											<small class="form-text text-danger">data kosong, belum diisi</small>
										</div>
										<?php else: ?>
											<div class="form-group">
												<label>NM Dusun</label>
												<input type="text" class="form-control" name="rt" placeholder="nm_dsn" value="<?php echo $hasil->nm_dsn ?>">
												<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
											</div>
										<?php endif ?>
								</div>
								<div class="col">
									<?php if ($hasil->ds_kel == NULL): ?>
									<div class="form-group">
										<label class="text-danger">DS Kel</label>
										<input type="text" class="form-control border border-danger" name="ds_kel" placeholder="DS Kel">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>DS Kel</label>
											<input type="text" class="form-control" name="ds_kel" placeholder="DS Kel" value="<?php echo $hasil->ds_kel ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
								<?php endif ?>
								</div>
							</div>
						<div class="row">
							<div class="col">
								<?php if ($hasil->luas_tanah_milik == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Luas Tanah Milik</label>
										<input type="text" class="form-control border border-danger" name="rw" placeholder="Luas tanah milik" value="<?php echo $hasil->luas_tanah_milik ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>Luas Tanah Milik</label>
											<input type="text" class="form-control" name="luas_tanah_milik" placeholder="Luas Tanah Milik" value="<?php echo $hasil->luas_tanah_milik ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
								<?php endif ?>
							</div>
							<div class="col">
								<?php if ($hasil->luas_tanah_bukan_milik == NULL): ?>
									<div class="form-group">
										<label class="text-danger">Luas tanah bukan milik</label>
										<input type="text" class="form-control border border-danger" name="rw" placeholder="Luas tanah bukan milik" value="<?php echo $hasil->luas_tanah_bukan_milik ?>">
										<small class="form-text text-danger">data kosong, belum diisi</small>
									</div>
									<?php else: ?>
										<div class="form-group">
											<label>LuasTanah Bukan Milik</label>
											<input type="text" class="form-control" name="luas_tanah_bukan_milik" placeholder="Luas Tanah Bukan Milik" value="<?php echo $hasil->luas_tanah_bukan_milik ?>">
											<small class="form-text text-muted">Dapat menggunakan Alphabet dan angka</small>
										</div>
								<?php endif ?>
							</div>
						</div>
					</div>
					<div role="tabpanel" class="tab-pane fade show" id="3">
						<div class="row mt-4">
							<div class="col">
								<div class="border rounded p-3">
									<label class="text-info">Nomor SK Pendirian</label>
									<div><?php echo $hasil->sk_pendirian_sp; ?></div>
								</div>
							</div>
							<div class="col">
								<div class="border rounded p-3">
									<label class="text-info">Tanggal SK Pendirian</label>
									<div><?php echo $hasil->tgl_sk_pendirian_sp; ?></div>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<div class="border rounded p-3">
									<label class="text-info">Tanggal Berdiri</label>
									<div><?php echo $hasil->tgl_berdiri; ?></div>
								</div>
							</div>
							<div class="col">
								<?php if ($hasil->sk_izin_operasi == NULl): ?>
									<div class="border border-danger rounded p-3">
										<label class="text-info">Nomor SK Izin Operasi</label>
										<div class="text-danger">Data Belum diisi</div>
									</div>
									<?php else: ?>
										<div class="border rounded p-3">
											<label class="text-info">Nomor SK Izin Operasi</label>
											<div><?php echo $hasil->sk_izin_operasi; ?></div>
										</div>
								<?php endif ?>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col">
								<?php if ($hasil->tgl_sk_izin_operasi == NULl): ?>
									<div class="border border-danger rounded p-3">
										<label class="text-info">Tanggal SK Izin Operasi</label>
										<div class="text-danger">Data Belum diisi</div>
									</div>
									<?php else: ?>
										<div class="border rounded p-3">
											<label class="text-info">Tanggal SK Izin Operasi</label>
											<div><?php echo $hasil->tgl_sk_izin_operasi; ?></div>
										</div>
								<?php endif ?>
							</div>
							<div class="col"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>