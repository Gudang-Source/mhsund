<div class="card mt-4">
	<div class="card-body">
		<div class="card">
			<div class="card-body">
				<div class="row">
					<div class="col">
						<table>
							<tr>
								<td class="px-2">Nama Kurikulum</td>
								<td class="px-2">:</td>
								<td class="px-2"><?php echo $datamhs->nm_kurikulum_sp; ?></td>
							</tr>
							<tr>
								<td class="px-2">Program Studi</td>
								<td class="px-2">:</td>
								<td class="px-2"><?php echo $datamhs->nm_jenj_didik.' '.$datamhs->nm_lemb; ?></td>
							</tr>
							<tr>
								<td class="px-2">Jumlah SKS</td>
								<td class="px-2">:</td>
								<td class="px-2"><?php echo $datamhs->jml_sks_lulus.' SKS'; ?></td>
							</tr>
						</table>
					</div>
					<div class="col">
						<table>
							<tr>
								<td class="px-2">Mulai Beraku</td>
								<td class="px-2">:</td>
								<td class="px-2"><?php echo $datamhs->smt_mulai; ?></td>
							</tr>
							<tr>
								<td class="px-2">Jumlah Bobot Matakuliah Wajib</td>
								<td class="px-2">:</td>
								<td class="px-2"><?php echo $datamhs->jml_sks_wajib.' SKS'; ?></td>
							</tr>
							<tr>
								<td class="px-2">Jumlah Bobot Matakuliah Pilihan</td>
								<td class="px-2">:</td>
								<td class="px-2"><?php echo $datamhs->jml_sks_pilihan.' SKS'; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<table class="mt-2" style="font-size: 13px;width: 100%" border="1">
			<thead>
				<tr class="table-info">
					<th class="p-1 text-center" rowspan="2">NO</th>
					<th class="p-1 text-center" rowspan="2">KODE</th>
					<th class="p-1 text-center" rowspan="2">MATAKULIAH</th>
					<th class="p-1 text-center" rowspan="2">SMT</th>
					<th class="p-1 text-center" colspan="2">SKS</th>
					<th class="p-1 text-center" rowspan="2">WAJIB ?</th>
					<th class="p-1 text-center" rowspan="2" colspan="2"></th>
				</tr>
				<tr class="table-info">
					<th class="p-1 text-center">MK</th>
					<th class="p-1 text-center">TM</th>
				</tr>
			</thead>
			<tbody>
				<?php $no=1 ?>
				<?php foreach ($hasil as $mhs): ?>
					<tr>
						<td class="p-1 text-center"><?php echo $no; ?></td>
						<td class="p-1 text-left"><?php echo $mhs->kode_mk ?></td>
						<td class="p-1 "><?php echo $mhs->nm_mk ?></td>
						<td class="p-1 text-center"><?php echo $mhs->smt ?></td>
						<td class="p-1 text-center"><?php echo (int)$mhs->sks_mk ?></td>
						<td class="p-1 text-center"><?php echo (int)$mhs->sks_tm ?></td>
						<td class="p-1 text-center">
							<?php if ($mhs->a_wajib == 1): ?>
								<i class="ti ti-check text-success"></i>
								<?php else: ?>
								<i class="ti ti-close text-danger"></i>
							<?php endif ?>
						</td>
						<td class="p-1 text-center "><a href="#" class="text-danger" onclick="javascript: return confirm('Yakin menghapus Matakuliah ini ?')"><i class="ti ti-trash"></i></a></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>