<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col-md-2">
				<?php $this->view('nav/mahasiswa'); ?>
			</div>
			<div class="col-md-10">
				<?php $this->view('admin/mahasiswa/top-mhs-v'); ?>
				<h5 class="text-info">Akumulasi Nilai Mahasiswa</h5><hr/>
				<div class="">
					<table class="table " style="font-size: 13px;">
						<tr>
							<th class="text-center text-midle ">NO</th>
							<th class="text-midle">MATAKULIAH</th>
							<th class="text-center text-midle ">SMT</th>
							<th class="text-center text-midle ">SKS</th>
							<th class="text-center text-midle ">NILAI</th>
							<th colspan="2"></th>
						</tr>

						<tbody>
							<?php $no = 1 ?>
							<?php foreach ($hasil as $data): ?>
								<tr>
									<td class="text-center"><?php echo $no; ?></td>
									<td><?php echo $data->nm_mk; ?></td>
									<td class="text-center"><?php echo $data->id_smt; ?></td>
									<td class="text-center"><?php echo $data->sks_mk; ?></td>
									<td class="text-center"><?php echo $data->nilai_huruf; ?></td>
									<td class="text-center"><a href="<?php echo base_url('index.php/admin/mahasiswa/edit_nilai/'.$data->id) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
									<td class="text-center"><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
								</tr>
								<?php $no++ ?>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>