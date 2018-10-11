<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info"><?php echo $title; ?></h5><hr/>
		<form action="<?php echo base_url('index.php/admin/dosen_lb/penugasan/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan NNama atau Noreg Dosen LB">
                        <small class="form-text text-muted">Gunakan Nama atau Noreg Dosen LB</small>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="form-group">
                            <label><i class="ti ti-tag"></i> Berdasarkan Prodi</label>
                            <select class="form-control form-control-sm" name="prodi" onchange="this.form.submit()">
                                <option value="">-- Semua Prodi --</option>
                                <?php foreach ($prodi as $data): ?>
                                    <option value="<?php echo $data->id_sms ?>"><?php echo strtoupper($data->nm_jenj_didik.' '.$data->nm_lemb); ?></option>
                                <?php endforeach ?>
                            </select>
                            <small class="form-text text-muted">Pilih dari salah satu data yang ada</small>
                        </div>
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
					<td class="text-center p-1">Tahun Ajaran</td>
					<td class="text-center p-1">Program Studi</td>
					<td class="text-center p-1">No Srt Tugas</td>
					<td class="text-center p-1">Tgl Srt Tugas</td>
					<td class="text-center p-1" colspan="2"></td>
				</tr>
				<tbody>
					<?php if ($hasil == TRUE): ?>
						<?php $no=$offset+1 ?>
						<?php foreach ($hasil as $data): ?>
							<tr>
								<td class="text-center p-1"><?php echo $no; ?></td>
								
								<td class="text-center p-1"><?php echo $data->noreg_dsn_lb; ?></td>
								<td class="p-1"><a href="<?php echo base_url('index.php/admin/dosen/detail/'.$data->id_dosen_lb_pt) ?>" class="text-dark"><?php echo $data->nm_dsn_lb; ?></a></td>
								<td class="text-center"><?php echo $data->nm_thn_ajaran; ?></td>
								<td class="p-1"><?php echo $data->nm_jenj_didik.' - '.$data->nm_lemb; ?></td>
								<td class="p-1"><?php echo $data->no_srt_tgs; ?></td>
								<td class="text-center p-1"><?php echo $data->tgl_srt_tgs; ?></td>
								<td class="text-center p-1"><a href="<?php echo base_url('index.php/admin/dosen/detail_tgs/'.$data->id_dosen_lb_pt) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
	                    		<td class="text-center p-1"><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
							</tr>
							<?php $no++ ?>
						<?php endforeach ?>
						<?php else: ?>
							<tr>
								<td colspan="10" class="text-center p-1">Tidak ada data ditemukan</td>
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
								<input type="text" class="form-control" name="nik_dsn_lb" placeholder="Masukan Nama Lengkap" required>
								<small class="form-text text-muted">hanya angka dapat digunakan untuk mengisi data diatas</small>
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