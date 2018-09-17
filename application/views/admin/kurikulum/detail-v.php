<div class="card">
	<div class="card-body">
		<table class="table" style="font-size: 13px">
			<thead>
				<tr>
					<th class="text-center" rowspan="2">NO</th>
					<th class="text-center" rowspan="2">KODE</th>
					<th class="" rowspan="2">MATAKULIAH</th>
					<th class="text-center" rowspan="2">SMT</th>
					<th class="text-center" colspan="2">SKS</th>
					<th class="text-center" rowspan="2" colspan="2"></th>
				</tr>
				<tr>
					<th class="text-center">MK</th>
					<th class="text-center">TM</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ?>
				<?php foreach ($hasil as $mhs): ?>
					<tr>
						<td class="text-center"><?php echo $no; ?></td>
						<td class="text-left"><?php echo $mhs->kode_mk ?></td>
						<td class=""><?php echo $mhs->nm_mk ?></td>
						<td class="text-center"><?php echo $mhs->smt ?></td>
						<td class="text-center"><?php echo (int)$mhs->sks_mk ?></td>
						<td class="text-center"><?php echo (int)$mhs->sks_tm ?></td>
						<td class="text-center "><a href="#" class="text-danger" onclick="javascript: return confirm('Yakin menghapus Matakuliah ini ?')"><i class="ti ti-trash"></i></a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>