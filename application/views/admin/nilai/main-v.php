<div class="card mt-4">
	<div class="card-body">
		<table width="100%" border="1" style="font-size: 13px;">
			<tr class="table-info">
				<td rowspan="2" class="text-center p-1">No</td>
				<td rowspan="2" class="text-center p-1">NIM</td>
				<td rowspan="2" class="text-center p-1">Nama Mahasiswa</td>
				<td rowspan="2" class="text-center p-1">Kode MK</td>
				<td rowspan="2" class="text-center p-1">Matakuliah</td>
				<td rowspan="2" class="text-center p-1">SMT</td>
				<td rowspan="2" class="text-center p-1">Prodi</td>
				<td colspan="3" class="text-center p-1">Nilai</td>
				<td colspan="2" rowspan="2" class="text-center p-1"></td>
			</tr>
			<tr class="table-info">
				<td class="text-center p-1">Angka</td>
				<td class="text-center p-1">Huruf</td>
				<td class="text-center p-1">Index</td>
			</tr>
			<?php $no = $offset+1 ?>
			<?php foreach ($hasil as $data): ?>
				<tr>
					<td class="text-center p-2"><?php echo $no; ?></td>
					<td class="text-center p-2"><?php echo $data->nipd; ?></td>
					<td class="p-2"><?php echo $data->nm_pd; ?></td>
					<td class="p-2"><?php echo $data->kode_mk; ?></td>
					<td class="p-2"><?php echo $this->Admin_m->detail_data('mata_kuliah','kode_mk',$data->kode_mk)->nm_mk; ?></td>
					<td class="text-center p-2"><?php echo $data->id_smt; ?></td>
					<td class="p-2"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></td>
					<td class="p-2"><?php echo $data->nilai_angka; ?></td>
					<td class="p-2"><?php echo $data->nilai_huruf; ?></td>
					<td class="p-2"><?php echo $data->nilai_indeks; ?></td>
					<td class="p-2"><a href="#" class="text-info"><i class="t ti-pencil"></i></a></td>
					<td class="p-2"><a href="#" class="text-danger"><i class="t ti-trash"></i></a></td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
		<div class="row mt-4">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
	</div>
</div>