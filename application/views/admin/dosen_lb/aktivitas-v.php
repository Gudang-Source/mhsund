<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<?php if ($this->ion_auth->is_admin()): ?>
				<div class="col-md-2">
					<?php $this->view('nav/dosen'); ?>
				</div>
				<div class="col-md-10">
					<?php else: ?>
						<div class="col">
						<?php endif ?>
				<?php $this->view('admin/dosen/top-dosen-v'); ?>
				<span class="text-info"><?php echo $jumlah.' Data Ditemukan'; ?></span>
				<table class="table table-striped" style="font-size: 13px">
					<thead>
						<tr class="table-info">
							<th rowspan="2" class="text-center">No</th>
							<th rowspan="2" class="text-center">Periode</th>
							<th rowspan="2">Matakuliah</th>
							<th rowspan="2" class="text-center">Kelas</th>
							<th colspan="2" class="text-center">Pertemuan</th>
						</tr>
						<tr class="table-info">
							<th class="text-center">Renc</th>
							<th class="text-center">Real</th>
						</tr>
						<tbody>
							<?php $no=$offset+1 ?>
							<?php foreach ($hasil as $data): ?>
								<tr>
									<td class="text-center"><?php echo $no; ?></td>
									<td class="text-center"><?php echo @$this->Admin_m->detail_data('tahun_ajaran','id_thn_ajaran',$data->id_thn_ajaran)->nm_thn_ajaran; ?></td>
									<td><?php echo @$this->Admin_m->detail_data('mata_kuliah','id',$data->id_mk_siakad)->nm_mk; ?></td>
									<td class="text-center"><?php echo @$data->nm_kls; ?></td>
									<td class="text-center"><?php echo @$data->jml_tm_renc; ?></td>
									<td class="text-center"><?php echo @$data->jml_tm_real; ?></td>
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
	</div>
</div>