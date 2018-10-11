<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info"><?php echo $title; ?></h5><hr/>
		<form action="<?php echo base_url('index.php/admin/dosen/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan Nama atau Noreg Dosen LB">
                        <small class="form-text text-muted">Gunakan Nama atau Noreg Dosen LB</small>
                    </div>
                </div>
            </div>
        </form>
        <button class="btn btn-outline-dark btn-sm mb-2" data-toggle="modal" data-target="#adddosenlb"><i class="ti ti-plus"></i> Tambah Dosen LB</button>
		<table border="1" width="100%" style="font-size: 13px">
			<thead>
				<tr class="table-info">
					<td class="text-center p-1">No</td>
					<td class="text-center p-1">Noreg</td>
					<td class="text-center p-1">Nama Dosen LB</td>
					<td class="text-center p-1">L/p</td>
					<td class="text-center p-1">Agama</td>
					<td class="text-center p-1">Tgl Lahir</td>
					<td class="text-center p-1">Status</td>
					<td colspan="2"></th>
				</tr>
				<tbody>
					<?php if ($hasil == TRUE): ?>
						<?php $no=$offset+1 ?>
						<?php foreach ($hasil as $data): ?>
							<tr>
								<td class="text-center p-1"><?php echo $no; ?></td>
								<td class="text-center p-1"><?php echo $data->noreg_dsn_lb; ?></td>
								<td class="p-1"><a href="<?php echo base_url('index.php/admin/dosen_lb/detail/'.$data->id_dosen_lb) ?>" class="text-dark"><?php echo $data->nm_dsn_lb; ?></a></td>
								<td class="text-center p-1"><?php echo $data->jk_dsn_lb; ?></td>
								<td class="text-center p-1"><?php echo $data->nm_agama; ?></td>
								<td class="text-center p-1"><?php echo $data->tgl_lhr_dsn_lb; ?></td>
								<td class="p-1"></td>
								<td class="text-center p-1"><a href="<?php echo base_url('index.php/admin/dosen_lb/detail/'.$data->id_dosen_lb) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
	                    		<td class="text-center p-1"><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td class="text-center p-1" colspan="10">Tidak ada data di temukan</td>
							</tr>
					<?php endif ?>
				</tbody>
			</thead>
		</table>
		<div class="row mt-2">
            <div class="col">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
            </div>
        </div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="adddosenlb" tabindex="-1" role="dialog" aria-labelledby="adddosenlb" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="adddosenlb">Tambah Dosen LB</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form>
				<div class="modal-body">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nama Lengkap Dosen LB</label>
								<input type="text" class="form-control" name="nm_dsn_lb" placeholder="Masukan Nama Lengkap" required>
								<small class="form-text text-muted">Nama Lengkap dan di tambahkand dengan gelar</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nomor Induk Kependudukan (NIK)</label>
								<input type="text" class="form-control" name="nik_dsn_lb" placeholder="Masukan Nomor KTP Dosen LB" required>
								<small class="form-text text-muted">hanya angka dapat digunakan untuk mengisi data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Tempat Lahir</label>
								<input type="text" class="form-control" name="tmpt_lhr_dsn_lb" placeholder="Nama Daerah Dosen LB dilahirkan" required>
								<small class="form-text text-muted">Gunakan nama Daerah/Wilayah</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="text" class="form-control" name="tgl_lhr_dsn_lb" placeholder="Masukan Tanggal Lahir" required>
								<small class="form-text text-muted">gunakan format TAHUN-BULAN-HARI Misal, 1993-05-07</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nomor HP</label>
								<input type="text" class="form-control" name="no_hp_dsn_lb" placeholder="Masukan Nomor HP Dosen LB" required>
								<small class="form-text text-muted">hanya angka dapat digunakan untuk mengisi data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email_dsn_lb" placeholder="Email Dosen LB" required>
								<small class="form-text text-muted">gunakan format email yang benar dan email aktif pribadi Dosen LB</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<select name="jk_dsn_lb" class="form-control">
									<option value="l">laki-laki</option>
									<option value="p">Perempuan</option>
								</select>
								<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Agama</label>
								<select name="id_agama" class="form-control">
									<?php foreach ($agama as $data): ?>
										<option value="<?php echo $data->id_agama ?>"><?php echo $data->nm_agama; ?></option>
									<?php endforeach ?>
								</select>
								<small class="form-text text-muted">Pilih salah satu dari data diatas</small>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Alamat Lengkap Dosen LB</label>
								<textarea class="form-control" name="alamat_lb" placeholder="Alamat Lengkap Dosen LB"></textarea>
								<small class="form-text text-muted">Gunakan alamat lengkap saat ini dosen LB berdomisili atau masukan sesuai data KTP Dosen LB</small>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-sm">Buat Dosen LB</button>
				</div>
			</form>
		</div>
	</div>
</div>