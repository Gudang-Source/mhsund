<div class="card mt-4">
	<div class="card-body">
		Daftar Akun Prodi<hr/>
		<table width="100%" border="1" style="font-size: 13px">
			<tr class="table-info">
				<td class="text-center p-1">No</td>
				<td class="text-center p-1">Nama</td>
				<td class="text-center p-1">Username</td>
				<td class="text-center p-1">Program Studi</td>
				<td class="text-center p-1">Status</td>
				<td class="text-center p-1" colspan="2"></td>
			</tr>
			<?php $no = $offset+1 ?>
			<?php foreach ($hasil as $data): ?>
				<tr>
					<td class="text-center p-2"><?php echo $no; ?></td>
					<td class="p-2"><?php echo $data->first_name; ?></td>
					<td class="text-center p-2"><?php echo $data->username; ?></td>
					<td class="p-2"><?php echo $data->nm_jenj_didik.' - '.$data->nm_lemb; ?></td>
					<td class="text-center p-2">
						<?php if ($data->active == 1): ?>
							<span class="text-success">Aktif</span>
							<?php else: ?>
								<span class="text-danger">Onaktif</span>
						<?php endif ?>
					</td>
					<td class="text-center p-2">
						<a href="#" class="text-info"><i class="ti ti-pencil"></i></a>
					</td>
					<td class="text-center p-2">
						<a href="#" class="text-danger"><i class="ti ti-trash"></i></a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	</div>
</div>