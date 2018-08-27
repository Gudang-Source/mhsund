<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info"><?php echo $title; ?></h5><hr/>
		<form action="<?php echo base_url('index.php/admin/dosen/penugasan/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan Nama atau NIDN Dosen">
                        <small class="form-text text-muted">Gunakan nama atau NIDN Dosen</small>
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
		<table class="table table-striped" style="font-size: 13px">
			<thead>
				<tr>
					<th class="text-center">No</th>
					<th>Nama Dosen</th>
					<th>NIDN</th>
					<th class="text-center">Tahun Ajaran</th>
					<th>Program Studi</th>
					<th>No Srt Tugas</th>
					<th>Tgl Srt Tugas</th>
					<th>Homebase?</th>
					<th colspan="2"></th>
				</tr>
				<tbody>

					<?php $no=$offset+1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><a href="<?php echo base_url('index.php/admin/dosen/detail/'.$data->id) ?>" class="text-dark"><?php echo $data->nm_sdm; ?></a></td>
							<td><?php echo $data->nidn; ?></td>
							<td class="text-center"><?php echo $data->nm_thn_ajaran; ?></td>
							<td><?php echo $data->nm_lemb; ?></td>
							<td><?php echo $data->no_srt_tgs; ?></td>
							<td><?php echo $data->tgl_srt_tgs; ?></td>
							<td></td>
							<td><a href="<?php echo base_url('index.php/admin/dosen/detail_tgs/'.$data->id) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
                    		<td><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
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