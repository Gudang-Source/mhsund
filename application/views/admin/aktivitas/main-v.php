<div class="card mt-4">
	<div class="card-body">
		<table border="1" width="100%">
			<tr class="table-info">
				<th rowspan="2" class="text-center px-1">No</th>
				<th rowspan="2" class="text-center">NIPD</th>
				<th rowspan="2" class="text-center px-1">Nama</th>
				<th rowspan="2" class="text-center px-1">Program Studi</th>
				<th rowspan="2" class="text-center px-1">Semester</th>
				<th rowspan="2" class="text-center px-1">SKS</th>
				<th colspan="2" class="text-center p-1">Nilai</th>
				<th rowspan="2" class="text-center px-1">Status</th>
			</tr>
			<tr class="table-info">
				<th class="text-center p-1">IPS</th>
				<th class="text-center p-1">IPK</th>
			</tr>
			<?php $no= $offset+1 ?>
			<?php foreach ($hasil as $data): ?>
				<tr>
					<td class="text-center p-1"><?php echo $no; ?></td>
					<td class="text-center p-1"><?php echo $data->nipd; ?></td>
					<td class="p-1"><?php echo strtoupper($data->nm_pd); ?></td>
					<td class="p-1"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></td>
					<td class="p-1"><?php echo $data->id_smt; ?></td>
					<td class="p-1"><?php echo $data->sks_total; ?></td>
					<td class="p-1"><?php echo $data->ipk; ?></td>
					<td class="p-1"><?php echo $data->ips; ?></td>
					<td class="p-1"><?php echo $data->id_stat_mhs; ?></td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
	</div>
</div>