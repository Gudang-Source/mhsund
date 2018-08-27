<div class="card my-4">
	<div class="card-body">
		<h5 class="text-info m-0">Detail Peserta Calon Mahasiswa</h5><hr/>
		<div class="card">
			<div class="card-body">
				<h6 class="text-info m-0">Data Diri</h6><hr/>
				<table width="100%" class="mb-4">
					<tr>
						<td><img src="http://pmb.unidayan.ac.id/asset/img/users/<?php echo $hasil->profile ?>" class="img-thumbnail"></td>
						<td></td>
					</tr>
				</table>
				<table width="100%">
					<tr>
						<td>Nomor Registrasi</td>
						<td>:</td>
						<td><?php echo strtoupper($hasil->noreg); ?></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td>:</td>
						<td><?php echo strtoupper($hasil->nama_mhs); ?></td>
					</tr>
					<tr>
						<td>Nomor KTP</td>
						<td>:</td>
						<td><?php echo$hasil->nik; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td>:</td>
						<td><?php echo$hasil->email_mhs; ?></td>
					</tr>
					<tr>
						<td>Nomor HP</td>
						<td>:</td>
						<td><?php echo$hasil->no_hp_mhs; ?></td>
					</tr>
					<tr>
					  <td>Jenis Kelamin</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->gender_mhs); ?></td>
					</tr>
					<tr>
					  <td>Agama</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('agama','id_agama',$hasil->id_agama)->nm_agama); ?></td>
					</tr>
					<tr>
					  <td>Tempat Tanggal Lahir</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->tmpt_lahir).'/'.$hasil->tgl_lhr_mhs; ?></td>
					</tr>
					<tr>
					  <td>Asal Sekolah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->asal_sekolah); ?></td>
					</tr>
					<tr>
					  <td>Rata-rata Nem</td>
					  <td>:</td>
					  <td><?php echo $hasil->nem; ?></td>
					</tr>
					<tr>
					  <td>Jurusan Sekolah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->jurse); ?></td>
					</tr>
					<tr>
					  <td>Tahun Lulus</td>
					  <td>:</td>
					  <td><?php echo $hasil->tahun_lulus; ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<h6 class="text-info m-0">Data Orang Tua</h6><hr/>
				<table width="100%">
					<tr>
					  <td colspan="3"><b>1. Ibu Kandung</b></td>
					</tr>
					<tr>
					  <td>Nama Ibu kandung</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->nm_ibu_kandung); ?></td>
					</tr>
					<tr>
					  <td>Tanggal Lahir Ibu kandung</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->tgl_lahir_ibu); ?></td>
					</tr>
					<tr>
					  <td>Jenjang Pendidikan Ibu kandung</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('jenjang_pendidikan','id_jenj_didik',$hasil->id_jenjang_pendidikan_ibu)->nm_jenj_didik); ?></td>
					</tr>
					<tr>
					  <td>Pekerjaan Ibu kandung</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('pekerjaan','id_pekerjaan',$hasil->id_pekerjaan_ibu)->nm_pekerjaan); ?></td>
					</tr>
					<tr>
					  <td>Penghasilan Ibu kandung</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('penghasilan','id_penghasilan',$hasil->id_penghasilan_ibu)->nm_penghasilan); ?></td>
					</tr>
					<tr>
						<td colspan="3">&nbsp;</td>
					</tr>
					<tr>
					  <td colspan="3"><b>2. Ayah</b></td>
					</tr>
					<tr>
					  <td>Nama Ayah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->nama_ot_mhs); ?></td>
					</tr>
					<tr>
					  <td>Tanggal Lahir Ayah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($hasil->tgl_lahir_ayah); ?></td>
					</tr>
					<tr>
					  <td>Jenjang Pendidikan Ayah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('jenjang_pendidikan','id_jenj_didik',$hasil->id_jenjang_pendidikan_ayah)->nm_jenj_didik); ?></td>
					</tr>
					<tr>
					  <td>Pekerjaan Ayah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('pekerjaan','id_pekerjaan',$hasil->id_pekerjaan_ayah)->nm_pekerjaan); ?></td>
					</tr>
					<tr>
					  <td>Penghasilan Ayah</td>
					  <td>:</td>
					  <td><?php echo strtoupper($this->Admin_m->detail_data('penghasilan','id_penghasilan',$hasil->id_penghasilan_ayah)->nm_penghasilan); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card mt-4">
			<div class="card-body">
				<h6 class="text-info m-0">Data Pilihan Program Studi dan kelompok</h6><hr/>
				<table width="100%">
					<tr>
					  <td>Pilihan Kelompok</td>
					  <td>:</td>
					  <td>
					    <?php if ($hasil->kelompok == 1): ?>
					      IPA
					    <?php elseif ($hasil->kelompok == 2): ?>
					      IPS
					    <?php else: ?>
					      IPC
					    <?php endif ?>
					  </td>
					</tr>
					<tr>
						<td colspan="3">Pilihan Program Studi</td>
					</tr>
					<?php foreach ($jurusan as $data): ?>
					  <tr>
					    <td><input type="hidden" name="id_mhs" value="<?php echo $data->id_mhs ?>"></td>
					    <td>:</td>
					    <td>
					    	<div class="custom-control custom-radio">
					    	  <input type="radio" class="custom-control-input" name="id_pilihan" id="<?php echo $data->id_pilihan ?>" selected>
					    	  <label class="custom-control-label" for="<?php echo $data->id_pilihan ?>"><?php echo $data->nama_jenjang_pend.' '.$data->nama_prodi; ?></label>
					    	</div>
					    </td>
					  </tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
</div>