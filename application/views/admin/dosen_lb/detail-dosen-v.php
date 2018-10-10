<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<?php if ($this->ion_auth->is_admin()): ?>
				<div class="col-md-2">
					
				</div>
				<div class="col-md-10">
					<?php else: ?>
						<div class="col">
						<?php endif ?>
				<?php $this->view('admin/dosen_lb/top-dosen-v'); ?>
				<h5 class="text-info">Data Pribadi</h5><hr/>
				<div class="">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs" role="tablist">
							<li role="presentation" class="nav-item "><a href="#1" class="nav-link text-info active" aria-controls="home" role="tab" data-toggle="tab">Data Diri</a></li>
							<li role="presentation" class="nav-item"><a href="#3" class="nav-link text-info" aria-controls="settings" role="tab" data-toggle="tab">Akun Detail</a></li>
						</ul>
					</div>
				</div>
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane fade show active" id="1">
						<form action="<?php echo base_url('index.php/admin/dosen_lb/update_dd/'.$hasil->id_dosen_lb) ?>" method="post">
							<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
								<div class="text-secondary">Nama Lengkap</div>
								<div><?php echo $hasil->nm_dsn_lb; ?></div><hr/>
								<div class="text-secondary">Noreg</div>
								<div><?php echo $hasil->noreg_dsn_lb; ?></div><hr/>
								<div class="text-secondary">Nomor Induk Kependudukan (NIK)</div>
								<?php if ($hasil->nik_dsn_lb == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="nik_dsn_lb" class="form-control" value="<?php echo $hasil->nik_dsn_lb ?>" placeholder="Nomor Induk Kependudukan">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="nik_dsn_lb" class="form-control" value="<?php echo $hasil->nik_dsn_lb ?>" placeholder="Nomor Induk Kependudukan">
									</div>
								<?php endif ?>
							</div>
							<div class="main-box mybgcolor rounded clearfix bts-ats">
								<div class="text-secondary">Tempat Lahir</div>
								<?php if ($hasil->tmpt_lhr_dsn_lb == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tmpt_lhr_dsn_lb" class="form-control" value="<?php echo $hasil->tmpt_lhr_dsn_lb ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tmpt_lhr_dsn_lb" class="form-control" value="<?php echo $hasil->tmpt_lhr_dsn_lb ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
								<div class="">
									<div class="text-secondary bts-ats">Tanggal Lahir</div>
									<?php if ($hasil->tgl_lhr_dsn_lb == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tgl_lhr_dsn_lb" class="form-control" value="<?php echo $hasil->tgl_lhr_dsn_lb ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="tgl_lhr_dsn_lb" class="form-control" value="<?php echo $hasil->tgl_lhr_dsn_lb ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
								</div>
							</div>
							<div class="main-box mybgcolor rounded clearfix bts-ats">
								<div class="text-secondary">Nomor Handphone</div>
								<?php if ($hasil->no_hp_dsn_lb == NULL ): ?>
									<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="no_hp_dsn_lb" class="form-control" value="<?php echo $hasil->no_hp_dsn_lb ?>" placeholder="Harap isi data ini">
										<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
									</div>
								<?php else: ?>
									<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
										<input type="text" name="no_hp_dsn_lb" class="form-control" value="<?php echo $hasil->no_hp_dsn_lb ?>" placeholder="Harap isi data ini">
									</div>
								<?php endif ?>
								<p class="text-secondary">No. handphone untuk menerima notifikasi terkait akun.</p>
								<div class="pembatas">
									<div class="text-secondary bts-ats">Alamat Email</div>
									<?php if ($hasil->email_dsn_lb == NULL ): ?>
										<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
											<input type="text" name="email_dsn_lb" class="form-control" value="<?php echo $hasil->email_dsn_lb ?>" placeholder="Harap isi data ini">
											<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
										</div>
										<?php else: ?>
											<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
												<input type="text" name="email_dsn_lb" class="form-control text-dark" value="<?php echo $hasil->email_dsn_lb ?>" placeholder="Harap isi data ini">
											</div>
										<?php endif ?>
										<p class="text-secondary">Alamat email untuk menerima notifikasi terkait akun.</p>
									</div>
								</div>
							<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
								<div class="row">
									<div class="col">
										<div class="pembatas">
											<div class="text-secondary bts-ats">Alamat Tempat Tinggal</div>
											<?php if ($hasil->alamat_lb == NULL ): ?>
												<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
													<textarea name="alamat_lb" class="form-control" placeholder="Masukan nama jalan"><?php echo $hasil->alamat_lb; ?></textarea>
													<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
												</div>
												<?php else: ?>
													<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
														<textarea name="alamat_lb" class="form-control" placeholder="Masukan nama jalan"><?php echo $hasil->alamat_lb; ?></textarea>
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
					<div role="tabpanel" class="tab-pane fade show" id="3">
						<form action="#" method="post">
							data akun
							<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Simpan keluarga</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>