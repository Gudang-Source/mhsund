<div class="card mt-4">
	<div class="card-body">
		<div class="row">
			<div class="col-md-2">
				<?php $this->view('nav/mahasiswa'); ?>
			</div>
			<div class="col-md-10">
				<?php $this->view('admin/mahasiswa/top-mhs-v'); ?>
				<table class="table" style="font-size: 13px">
					<thead>
						<tr>
							<th>No</th>
							<th>NIM</th>
							<th>Jenis Pendaftaran</th>
							<!-- <th>Periode</th> -->
							<th>Tanggal Masuk</th>
							<th>Perguruan Tinggi</th>
							<th>Program Studi</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach ($hasil as $data): ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data->nipd; ?></td>
								<td><?php echo $this->Admin_m->detail_data('jenis_pendaftaran','id_jns_daftar',$data->id_jns_daftar)->nm_jns_daftar; ?></td>
								<td><?php echo $data->tgl_masuk_sp; ?></td>
								<td><?php echo $this->Admin_m->detail_data('satuan_pendidikan','id_sp',$data->id_sp)->nm_lemb; ?></td>
								<td><?php echo $this->Admin_m->detail_data('sms','kode_prodi',$data->kode_sms)->nm_lemb; ?></td>
								<td><i class="ti ti-pencil text-info"></i></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>