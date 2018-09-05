<div style="margin-top: 14px; background-color: white;padding: 30px;height: 100%">
	<!-- Nav tabs -->
	<h5 class="text-info">Profil-ID</h5><hr/>
	<div class="">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" role="tablist">
				<li role="presentation" class="nav-item "><a href="#home" class="nav-link text-info active" aria-controls="home" role="tab" data-toggle="tab">Data Diri</a></li>
				<li role="presentation" class="nav-item"><a href="#profile" class="nav-link text-info" aria-controls="profile" role="tab" data-toggle="tab">Orang Tua</a></li>
				<li role="presentation" class="nav-item"><a href="#messages" class="nav-link text-info" aria-controls="messages" role="tab" data-toggle="tab">Wali</a></li>
				<li role="presentation" class="nav-item"><a href="#akun" class="nav-link text-info" aria-controls="messages" role="tab" data-toggle="tab">Akun</a></li>
				<li role="presentation" class="nav-item"><a href="#settings" class="nav-link text-info" aria-controls="settings" role="tab" data-toggle="tab">Status</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
	<div>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade show active" id="home">
				<form action="<?php echo base_url('index.php/admin/profil/update_dd/'.$hasil->idmhs) ?>" method="post">
					<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
						<div class="text-secondary">Nama Lengkap</div>
						<div><?php echo $users->first_name; ?></div><hr/>
						<div class="text-secondary">Nomor Stambuk / NIPD</div>
						<div><?php echo $hasil->nipd; ?></div><hr/>
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
						<div class="text-secondary">Nomor Hadphone</div>
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
										<input type="text" name="email" class="form-control text-dark" value="<?php echo $hasil->email_mhs ?>" placeholder="Harap isi data ini">
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
						<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Simpan data pribadi</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="profile">
				<form action="<?php echo base_url('index.php/admin/profil/update_do/'.$hasil->idmhs) ?>" method="post">
					<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
						<div class="text-secondary">Nama Lengkap Ibu kandung</div>
						<?php if ($hasil->nm_ibu_kandung == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nm_ibu_kandung" class="form-control" value="<?php echo $hasil->nm_ibu_kandung ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nm_ibu_kandung" class="form-control" value="<?php echo $hasil->nm_ibu_kandung ?>" placeholder="Harap isi data ini">
							</div>
						<?php endif ?>
						<div class="text-secondary">Tanggal Lahir Ibu kandung</div>
						<?php if ($hasil->tgl_lahir_ibu == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="tgl_lahir_ibu" class="form-control" value="<?php echo $hasil->tgl_lahir_ibu ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="tgl_lahir_ibu" class="form-control" value="<?php echo $hasil->tgl_lahir_ibu ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">NIK Ibu kandung</div>
						<?php if ($hasil->nik_ibu == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nik_ibu" class="form-control" value="<?php echo $hasil->nik_ibu ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nik_ibu" class="form-control" value="<?php echo $hasil->nik_ibu ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Pendidikan Terakhir Ibu kandung</div>
						<?php if ($hasil->id_jenjang_pendidikan_ibu == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_jenjang_pendidikan_ibu">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($pendidikan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_jenj_didik; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_jenjang_pendidikan_ibu">
									<option value="<?php echo $hasil->id_jenjang_pendidikan_ibu ?>">- <?php echo $this->Admin_m->detail_data('jenjang_pendidikan','id',$hasil->id_jenjang_pendidikan_ibu)->nm_jenj_didik; ?> -</option>
									<?php foreach ($pendidikan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_jenj_didik; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Pekerjaan Ibu kandung</div>
						<?php if ($hasil->id_pekerjaan_ibu == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_ibu">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($pekerjaan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_pekerjaan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_ibu">
									<option value="<?php echo $hasil->id_pekerjaan_ibu ?>">- <?php echo $this->Admin_m->detail_data('pekerjaan','id',$hasil->id_pekerjaan_ibu)->nm_pekerjaan; ?> -</option>
									<?php foreach ($pekerjaan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_pekerjaan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Penghasilan Ibu kandung</div>
						<?php if ($hasil->id_penghasilan_ibu == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_penghasilan_ibu">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($penghasilan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_penghasilan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_ibu">
									<option value="<?php echo $hasil->id_penghasilan_ibu ?>">- <?php echo $this->Admin_m->detail_data('penghasilan','id',$hasil->id_penghasilan_ibu)->nm_penghasilan; ?> -</option>
									<?php foreach ($penghasilan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_penghasilan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
					</div>
					<div class="main-box mybgcolor rounded clearfix bts-bwh2">
						<div class="text-secondary">Nama Lengkap Ayah kandung</div>
						<?php if ($hasil->nm_ayah == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nm_ayah" class="form-control" value="<?php echo $hasil->nm_ayah ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nm_ayah" class="form-control" value="<?php echo $hasil->nm_ayah ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Tanggal Lahir Ayah kandung</div>
						<?php if ($hasil->tgl_lahir_ayah == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="tgl_lahir_ayah" class="form-control" value="<?php echo $hasil->tgl_lahir_ayah ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="tgl_lahir_ayah" class="form-control" value="<?php echo $hasil->tgl_lahir_ayah ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">NIK Ayah kandung</div>
						<?php if ($hasil->nik_ayah == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nik_ayah" class="form-control" value="<?php echo $hasil->nik_ayah ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nik_ayah" class="form-control" value="<?php echo $hasil->nik_ayah ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Pendidikan Terakhir Ayah kandung</div>
						<?php if ($hasil->id_jenjang_pendidikan_ayah == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_jenjang_pendidikan_ayah">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($pendidikan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_jenj_didik; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_jenjang_pendidikan_ayah">
									<option value="<?php echo $hasil->id_jenjang_pendidikan_ayah ?>">- <?php echo $this->Admin_m->detail_data('jenjang_pendidikan','id',$hasil->id_jenjang_pendidikan_ayah)->nm_jenj_didik; ?> -</option>
									<?php foreach ($pendidikan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_jenj_didik; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Pekerjaan Ayah kandung</div>
						<?php if ($hasil->id_pekerjaan_ayah == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_ayah">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($pekerjaan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_pekerjaan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_ayah">
									<option value="<?php echo $hasil->id_pekerjaan_ayah ?>">- <?php echo $this->Admin_m->detail_data('pekerjaan','id',$hasil->id_pekerjaan_ayah)->nm_pekerjaan; ?> -</option>
									<?php foreach ($pekerjaan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_pekerjaan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Penghasilan Ayah kandung</div>
						<?php if ($hasil->id_penghasilan_ayah == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_penghasilan_ayah">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($penghasilan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_penghasilan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_penghasilan_ayah">
									<option value="<?php echo $hasil->id_penghasilan_ayah ?>">- <?php echo $this->Admin_m->detail_data('penghasilan','id',$hasil->id_penghasilan_ayah)->nm_penghasilan; ?> -</option>
									<?php foreach ($penghasilan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_penghasilan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Simpan data Orang Tua</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="messages">
				<form action="<?php echo base_url('index.php/admin/profil/update_dw/'.$hasil->idmhs) ?>" method="post">
					<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
						<div class="text-secondary">Nama Lengkap Wali</div>
						<?php if ($hasil->nm_wali == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nm_wali" class="form-control" value="<?php echo $hasil->nm_wali ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="nm_wali" class="form-control" value="<?php echo $hasil->nm_wali ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Tanggal Lahir Wali</div>
						<?php if ($hasil->tgl_lahir_wali == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="tgl_lahir_wali" class="form-control" value="<?php echo $hasil->tgl_lahir_wali ?>" placeholder="Harap isi data ini">
								<span class="text-danger" style="font-size: 12px;">Data kosong/belum diisi</span>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<input type="text" name="tgl_lahir_wali" class="form-control" value="<?php echo $hasil->tgl_lahir_wali ?>" placeholder="Harap isi data ini">
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Pendidikan Terakhir Wali</div>
						<?php if ($hasil->id_jenjang_pendidikan_wali == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_jenjang_pendidikan_wali">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($pendidikan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_jenj_didik; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_jenjang_pendidikan_wali">
									<option value="<?php echo $hasil->id_jenjang_pendidikan_wali ?>">- <?php echo $this->Admin_m->detail_data('jenjang_pendidikan','id',$hasil->id_jenjang_pendidikan_wali)->nm_jenj_didik; ?> -</option>
									<?php foreach ($pendidikan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_jenj_didik; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Pekerjaan Wali</div>
						<?php if ($hasil->id_pekerjaan_wali == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_wali">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($pekerjaan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_pekerjaan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_pekerjaan_wali">
									<option value="<?php echo $hasil->id_pekerjaan_wali ?>">- <?php echo $this->Admin_m->detail_data('pekerjaan','id',$hasil->id_pekerjaan_wali)->nm_pekerjaan; ?> -</option>
									<?php foreach ($pekerjaan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_pekerjaan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<div class="text-secondary">Penghasilan Wali</div>
						<?php if ($hasil->id_penghasilan_wali == NULL ): ?>
							<div class="main-box border border-danger rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_penghasilan_wali">
									<option value="1">- Belum diisi -</option>
									<?php foreach ($penghasilan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_penghasilan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php else: ?>
							<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
								<select class="form-control" name="id_penghasilan_wali">
									<option value="<?php echo $hasil->id_penghasilan_wali ?>">- <?php echo $this->Admin_m->detail_data('penghasilan','id',$hasil->id_pekerjaan_wali)->nm_penghasilan; ?> -</option>
									<?php foreach ($penghasilan as $data): ?>
										<option value="<?php echo $data->id ?>"><?php echo $data->nm_penghasilan; ?></option>
									<?php endforeach ?>
								</select>
							</div><hr/>
						<?php endif ?>
						<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Simpan data wali</button>
					</div>
				</form>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="akun">
				<form action="<?php echo base_url('index.php/admin/profil/proses_edit_akun') ?>" method="post">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label for="first_name">Nama Mahasiswa</label>
								<input type="hidden" name="id" value="<?php echo $users->id ?>">
								<input type="hidden" name="idmhs" value="<?php echo $hasil->idmhs ?>">
								<div class="form-control"><?php echo $users->first_name ?></div>
								<small id="first_name" class="form-text text-muted">tidak dapat di edit</small>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<div class="form-control"><?php echo $users->username ?></div>
						<small id="first_name" class="form-text text-muted">tidak dapat di edit</small>
					</div>
					<div class="form-group">
						<label for="password">Password Saat Ini</label>
						<div class="form-control border border-success text-success"><?php echo $users->repassword; ?></div>
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