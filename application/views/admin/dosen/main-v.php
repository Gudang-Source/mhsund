<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info"><?php echo $title; ?></h5><hr/>
		<form action="<?php echo base_url('index.php/admin/dosen/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan Nama atau NIDN Dosen">
                        <small class="form-text text-muted">Gunakan nama atau NIDN Dosen</small>
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
					<th>NIP</th>
					<th class="text-center">L/p</th>
					<th>Agama</th>
					<th>Tgl Lahir</th>
					<th>Status</th>
					<th colspan="2"></th>
				</tr>
				<tbody>

					<?php $no=$offset+1 ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td class="text-center"><?php echo $no; ?></td>
							<td><a href="<?php echo base_url('index.php/admin/dosen/detail/'.$data->id) ?>" class="text-dark"><?php echo $data->nm_sdm; ?></a></td>
							<td><?php echo $data->nidn; ?></td>
							<td><?php echo $data->nip; ?></td>
							<td class="text-center"><?php echo $data->jk; ?></td>
							<td><?php echo $data->nm_agama; ?></td>
							<td><?php echo $data->tgl_lahir; ?></td>
							<td></td>
							<td><a href="<?php echo base_url('index.php/admin/dosen/detail/'.$data->id) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
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