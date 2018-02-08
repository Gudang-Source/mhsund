<div style="margin-top: 14px; background-color: white;padding: 30px;height: 100%">
	<!-- Nav tabs -->
	<h5 class="text-info">Profil-ID</h5><hr/>
	<div>
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="btn btn-outline-info border-bottom-0"><a href="#home" class="text-info" aria-controls="home" role="tab" data-toggle="tab">Data Diri</a></li>
			<li role="presentation" class="btn btn-outline-info border-bottom-0"><a href="#profile" class="text-info" aria-controls="profile" role="tab" data-toggle="tab">Orang Tua</a></li>
			<li role="presentation" class="btn btn-outline-info border-bottom-0"><a href="#messages" class="text-info" aria-controls="messages" role="tab" data-toggle="tab">Wali</a></li>
			<li role="presentation" class="btn btn-outline-info border-bottom-0"><a href="#settings" class="text-info" aria-controls="settings" role="tab" data-toggle="tab">Status</a></li>
		</ul>
		<div class="clearfix"></div>
	</div>
	<div>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade show active" id="home">
				<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
					<div class="text-secondary">Nama Lengkap</div>
					<div><?php echo $users->first_name; ?></div><hr/>
					<div class="text-secondary">Nomor Stambuk / NIPD</div>
					<div><?php echo $hasil->nipd; ?></div><hr/>
					<div class="text-secondary">Nomor Induk Kependudukan (NIK)</div>
					<?php if ($hasil->nik == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->nik; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php endif ?>
				</div>
				<div class="main-box mybgcolor rounded clearfix bts-ats">
					<div class="text-secondary">Tempat Lahir</div>
					<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
						<span class="float-left"><?php echo $hasil->tmpt_lahir; ?></span>
						<span class="float-right text-primary">ubah</span>
					</div>
					<div class="">
						<div class="text-secondary bts-ats">Tanggal Lahir</div>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->tgl_lahir; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div>
						<p class="text-secondary">Pastikan tempat dan tanggal lahir sudah sesuai.</p>
					</div>
				</div>
				<div class="main-box mybgcolor rounded clearfix bts-ats">
					<div class="text-secondary">Nomor Hadphone</div>
					<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
						<span class="float-left"><?php echo $users->phone; ?></span>
						<span class="float-right text-primary">ubah</span>
					</div>
					<p class="text-secondary">No. handphone untuk menerima notifikasi terkait akun.</p>
					<div class="pembatas">
						<div class="text-secondary bts-ats">Alamat Email</div>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $users->email; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div>
						<p class="text-secondary">Alamat email untuk menerima notifikasi terkait akun.</p>
					</div>
				</div>
				<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
					<div class="row">
						<div class="col">
							<div class="text-secondary">Rukun Tetangga (RT)</div>
							<?php if ($hasil->rt == NULL): ?>
								<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left">Belum diisi</span>
									<span class="float-right text-primary">ubah</span>
								</div>
							<?php else: ?>
								<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left"><?php echo $hasil->rt; ?></span>
									<span class="float-right text-primary">ubah</span>
								</div>
							<?php endif ?>
							
						</div>
						<div class="col">
							<div class="text-secondary">Rukun Warga (RW)</div>
							<?php if ($hasil->rw == NULL): ?>
								<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left">Belum diisi</span>
									<span class="float-right text-primary">ubah</span>
								</div>
							<?php else: ?>
								<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left"><?php echo $hasil->rw; ?></span>
									<span class="float-right text-primary">ubah</span>
								</div>
							<?php endif ?>
						</div>	
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="profile">
				<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
					<div class="text-secondary">Nama Lengkap Ibu kandung</div>
					<?php if ($hasil->nm_ibu_kandung == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->nm_ibu_kandung; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Tanggal Lahir Ibu kandung</div>
					<?php if ($hasil->tgl_lahir_ibu == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->tgl_lahir_ibu; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">NIK Ibu kandung</div>
					<?php if ($hasil->nik_ibu == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->nik_ibu; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Pendidikan Terakhir Ibu kandung</div>
					<?php if ($hasil->id_jenjang_pendidikan_ibu == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_jenjang_pendidikan_ibu; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Pekerjaan Ibu kandung</div>
					<?php if ($hasil->id_pekerjaan_ibu == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_pekerjaan_ibu; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Penghasilan Ibu kandung</div>
					<?php if ($hasil->id_penghasilan_ibu == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_penghasilan_ibu; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php endif ?>
				</div>
				<div class="main-box mybgcolor rounded clearfix bts-bwh2">
					<div class="text-secondary">Nama Lengkap Ayah kandung</div>
					<?php if ($hasil->nm_ayah == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->nm_ayah; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Tanggal Lahir Ayah kandung</div>
					<?php if ($hasil->tgl_lahir_ayah == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->tgl_lahir_ayah; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">NIK Ayah kandung</div>
					<?php if ($hasil->nik_ayah == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->nik_ayah; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Pendidikan Terakhir Ayah kandung</div>
					<?php if ($hasil->id_jenjang_pendidikan_ayah == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_jenjang_pendidikan_ayah; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Pekerjaan Ayah kandung</div>
					<?php if ($hasil->id_pekerjaan_ayah == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_pekerjaan_ayah; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Penghasilan Ayah kandung</div>
					<?php if ($hasil->id_penghasilan_ayah == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_penghasilan_ayah; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php endif ?>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="messages">
				<div class="main-box mybgcolor rounded clearfix bts-bwh2">
					<div class="text-secondary">Nama Lengkap Wali</div>
					<?php if ($hasil->nm_wali == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->nm_wali; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Tanggal Lahir Wali</div>
					<?php if ($hasil->tgl_lahir_wali == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->tgl_lahir_wali; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Pendidikan Terakhir Wali</div>
					<?php if ($hasil->id_jenjang_pendidikan_wali == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_jenjang_pendidikan_wali; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Pekerjaan Wali</div>
					<?php if ($hasil->id_pekerjaan_wali == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_pekerjaan_wali; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Penghasilan Wali</div>
					<?php if ($hasil->id_penghasilan_wali == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum Diisi</span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_penghasilan_wali; ?></span>
							<span class="float-right text-primary">ubah</span>
						</div>
					<?php endif ?>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="settings">
				<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
					<div class="text-secondary">Nama Lengkap</div>
					<div><?php echo $users->first_name; ?></div><hr/>
					<div class="text-secondary">Nomor Stambuk / NIPD</div>
					<div><?php echo $hasil->nipd; ?></div><hr/>
					<div class="text-secondary">ID Fedeer</div>
					<?php if ($hasil->id_pd == NULL ): ?>
						<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left text-danger">Belum di import</span>
						</div><hr/>
					<?php else: ?>
						<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
							<span class="float-left"><?php echo $hasil->id_pd; ?></span>
						</div><hr/>
					<?php endif ?>
					<div class="text-secondary">Program Studi</div>
					<div><?php echo $hasil->nm_lemb; ?></div><hr/>
					<div class="row">
						<div class="col">
							<div class="text-secondary">Tanggal Masuk</div>
							<?php if ($hasil->tgl_masuk_sp == NULL): ?>
								<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left">Belum diisi</span>
								</div>
							<?php else: ?>
								<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left"><?php echo $hasil->tgl_masuk_sp; ?></span>
								</div>
							<?php endif ?>
							
						</div>
						<div class="col">
							<div class="text-secondary">Tanggal Keluar</div>
							<?php if ($hasil->tgl_keluar == NULL): ?>
								<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left">Masih Mahasiswa Aktif</span>
								</div>
							<?php else: ?>
								<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
									<span class="float-left"><?php echo $hasil->tgl_keluar; ?></span>
								</div>
							<?php endif ?>
						</div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>