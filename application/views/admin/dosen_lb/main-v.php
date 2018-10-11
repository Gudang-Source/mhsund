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