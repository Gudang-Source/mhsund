<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col-md-2">
				<?php $this->view('nav/mahasiswa'); ?>
			</div>
			<div class="col-md-10">
				<?php $this->view('admin/mahasiswa/top-mhs-v'); ?>
				<h5 class="text-info">Aktivitas Mahasiswa</h5><hr/>
				<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
					<div class="main-box">
						<table class="table" style="font-size: 13px">
							<tr style="width: 100%">
								<th class=" text-center">NO</th>
								<th >SMT</th>
								<th class="">PROGRAM STUDI</th>
								<th class=" text-center">STATUS</th>
								<th class=" text-center">IPS</th>
								<th class=" text-center">IPK</th>
								<th class=" text-center">SKS MK</th>
								<th class=" text-center">SKS TOT</th>
								<th colspan="2"></th>
							</tr>
							<?php $no = 1 ?>
							<?php foreach ($hasil as $data): ?>
								<tr style="width: 100%">
									<td class=" text-center"><?php echo $no; ?>.</td>
									<td ><?php echo $data->id_smt; ?></td>
									<td class=""><?php echo $datamhs->nm_lemb; ?></td>
									<td class=" text-center"><?php echo $data->id_stat_mhs; ?></td>
									<td class=" text-center"><?php echo $data->ips; ?></td>
									<td class=" text-center"><?php echo $data->ipk; ?></td>
									<td class=" text-center"><?php echo $data->sks_smt; ?></td>
									<td class=" text-center"><?php echo $data->sks_total; ?></td>
									<td><a href="<?php echo base_url('index.php/admin/mahasiswa/edit_kuliah_mhs/'.$data->id) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
									<td><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
								</tr>
								<?php $no++ ?>
							<?php endforeach ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
