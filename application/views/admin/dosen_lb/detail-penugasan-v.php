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
				<table class="table table-striped" style="font-size: 13px">
					<thead>
						<tr>
							<th class="text-center">No</th>
							<th class="text-center">Tahun Ajaran</th>
							<th>Program Studi</th>
							<th>No Srt Tugas</th>
							<th>Tgl Srt Tugas</th>
						</tr>
						<tbody>

							<?php $no=$offset+1 ?>
							<?php foreach ($hasil as $data): ?>
								<tr>
									<td class="text-center"><?php echo $no; ?></td>
									<td class="text-center"><?php echo @$data->nm_thn_ajaran; ?></td>
									<td><?php echo $data->id_sms; ?></td>
									<td><?php echo $data->no_srt_tgs; ?></td>
									<td><?php echo $data->tgl_srt_tgs; ?></td>
								</tr>
								<?php $no++ ?>
							<?php endforeach ?>
						</tbody>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>