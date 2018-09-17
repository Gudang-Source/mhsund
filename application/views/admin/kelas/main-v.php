<div class="card mt-4">
	<div class="card-body">
		<form action="<?php echo base_url('index.php/admin/kelas/index/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian Matakuliah</label>
                        <input type="text" name="matakuliah" class="form-control form-control-sm" placeholder="Masukan nama matakuliah">
                        <small class="form-text text-muted">Gunakan nama Matakuliah</small>
                    </div>
                </div>
                 <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian Semester</label>
                        <input type="text" name="semester" class="form-control form-control-sm" placeholder="Masukan semester">
                        <small class="form-text text-muted">Gunakan Semester</small>
                    </div>
                </div>
            </div>
        </form>
		<table class="table mt-4" style="font-size: 13px;">
			<thead>
				<tr> 
					<th class="text-center " rowspan="2">No</th>
					<th class="text-center" rowspan="2">Kode</th>
					<th class="text-center" rowspan="2">Matakuliah</th>
					<th class="text-center" rowspan="2">Prodi</th>
					<th class="text-center" rowspan="2">Semester</th>
					<th class="text-center" rowspan="2">Kelas</th>
					<th class="text-center" colspan="2">SKS</th>
					<th class="text-center" rowspan="2"></th>
				</tr>
				<tr>
					<th class="text-center">MK</th>
					<th class="text-center">TM</th>
				</tr>
			</thead>
			<tbody> 
				<?php $no=$offset+1; ?>
				<?php foreach ($hasil as $data): ?>
					<tr> 
						<td class="text-center"><?php echo $no; ?></td>
						<td class=""><?php echo $data->kode_mk; ?></td>
						<td><a href="<?php echo base_url('index.php/admin/kelas/detail/'); ?><?php echo $data->id_kelas; ?>" class="text-info"><?php echo strtoupper($data->nm_mk);?></a></td>
						<td class=""><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></td>
						<td class="text-center"><?php echo $data->id_smt ?></td>
						<td class="text-center"><?php echo $data->nm_kls ?></td>
						<td class="text-center"><?php echo (int)$data->sks_mk ?></td>
						<td class="text-center"><?php echo (int)$data->sks_tm ?></td>
						<td class="text-center"><a href="#" onclick="javascript: return confirm('Yakin menghapus Kelas ini ?')"><i class="ti ti-trash text-danger"></i></a></td>
					</tr>
					<?php  $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
		<div class="row mt-4">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>