<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col-md-2">
				<?php $this->view('nav/dosen'); ?>
			</div>
			<div class="col-md-10">
				<?php $this->view('admin/dosen/top-dosen-v'); ?>
				<h5 class="text-info">Data Pribadi</h5><hr/>
				<div class="">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs" role="tablist">
							<li role="presentation" class="nav-item "><a href="#1" class="nav-link text-info active" aria-controls="home" role="tab" data-toggle="tab">Data Diri</a></li>
							<li role="presentation" class="nav-item"><a href="#2" class="nav-link text-info" aria-controls="profile" role="tab" data-toggle="tab">Keluarga</a></li>
							<li role="presentation" class="nav-item"><a href="#3" class="nav-link text-info" aria-controls="settings" role="tab" data-toggle="tab">Akun Detail</a></li>
						</ul>
					</div>
				</div>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade show active" id="1">
						<form action="<?php echo base_url('index.php/admin/dosen/update_dd/'.$hasil->id) ?>" method="post">
							<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
								<div class="text-secondary">Nama Lengkap</div>
								<div><?php echo $hasil->nm_sdm; ?></div><hr/>
								<div class="text-secondary">NIDN</div>
								<div><?php echo $hasil->nidn; ?></div><hr/>
								<div class="text-secondary">Nomor Induk Kependudukan (NIK)</div>
								<?php if ($hasil->nik == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="nik" class="form-control" value="<?php echo $hasil->nik ?>" placeholder="Nomor Induk Kependudukan">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="nik" class="form-control" value="<?php echo $hasil->nik ?>" placeholder="Nomor Induk Kependudukan">
									</div>
								<?php endif ?>
								<div class="text-secondary">Nomor Induk Pegawai (NIP)</div>
								<?php if ($hasil->nip == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="nip" class="form-control" value="<?php echo $hasil->nip ?>" placeholder="Nomor Induk Pegawai">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="nip" class="form-control" value="<?php echo $hasil->nip ?>" placeholder="Nomor Induk Kependudukan">
									</div>
								<?php endif ?>
							</div>
							<div class="main-box mybgcolor rounded clearfix bts-ats">
								<div class="text-secondary">Tempat Lahir</div>
								<?php if ($hasil->tmpt_lahir == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tmpt_lahir" class="form-control" value="<?php echo $hasil->tmpt_lahir ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tmpt_lahir" class="form-control" value="<?php echo $hasil->tmpt_lahir ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
								<div class="">
									<div class="text-secondary bts-ats">Tanggal Lahir</div>
									<?php if ($hasil->tgl_lahir == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tgl_lahir" class="form-control" value="<?php echo $hasil->tgl_lahir ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tgl_lahir" class="form-control" value="<?php echo $hasil->tgl_lahir ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
								</div>
							</div>
							<div class="main-box mybgcolor rounded clearfix bts-ats">
								<div class="text-secondary">Nomor Handphone</div>
								<?php if ($hasil->no_hp == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="no_hp" class="form-control" value="<?php echo $hasil->no_hp ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="no_hp" class="form-control" value="<?php echo $hasil->no_hp ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
								<p class="text-secondary">No. handphone untuk menerima notifikasi terkait akun.</p>
								<div class="pembatas">
									<div class="text-secondary bts-ats">Alamat Email</div>
									<?php if ($hasil->email == NULL ): ?>
										<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
											<input type="text" name="email" class="form-control" value="<?php echo $hasil->email_mhs ?>" placeholder="Harap isi data ini">
											<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
										</div>
										<?php else: ?>
											<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
												<input type="text" name="email" class="form-control text-dark" value="<?php echo $hasil->email ?>" placeholder="Harap isi data ini">
											</div>
										<?php endif ?>
										<p class="text-secondary">Alamat email untuk menerima notifikasi terkait akun.</p>
									</div>
								</div>
							<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
								<div class="row">
									<div class="col">
										<div class="text-secondary">Rukun Tetangga (RT)</div>
										<?php if ($hasil->rt == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="rt" class="form-control" value="<?php echo $hasil->rt ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="rt" class="form-control" value="<?php echo $hasil->rt ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
									</div>
									<div class="col">
										<div class="text-secondary">Rukun Warga (RW)</div>
										<?php if ($hasil->rw == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="rw" class="form-control" value="<?php echo $hasil->rw ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="rw" class="form-control" value="<?php echo $hasil->rw ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
									</div>	
								</div>
								<div class="row">
									<div class="col">
										<div class="pembatas">
											<div class="text-secondary bts-ats">Alamat Tempat Tinggal</div>
											<?php if ($hasil->jln == NULL ): ?>
												<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
													<textarea name="jln" class="form-control" placeholder="Masukan nama jalan"><?php echo $hasil->jln; ?></textarea>
													<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
												</div>
												<?php else: ?>
													<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
														<textarea name="jln" class="form-control" placeholder="Masukan nama jalan"><?php echo $hasil->jln; ?></textarea>
													</div>
												<?php endif ?>
												<p class="text-secondary">Alamat tempat tinggal, sebutkan nama jalan, dan Provinsi dengan lengkap jika ada.</p>
											</div>
									</div>
								</div>
								<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Simpan data pribadi</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>