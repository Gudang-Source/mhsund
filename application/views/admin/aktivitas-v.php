<div style="margin-top: 14px;background-color: white; padding: 30px">
	<h5 class="text-info">Aktivitas Mahasiswa</h5><hr/>
	<div class="main-box mybgcolor rounded clearfix bts-bwh2 bts-ats">
		<div class="main-box">
			<table width="100%">
				<tr style="width: 100%">
					<th width="5%" class=" text-center">NO</th>
					<th width="10%" >SMT</th>
					<th width="30%" class="">PROGRAM STUDI</th>
					<th width="15%" class=" text-center">STATUS</th>
					<th width="10%" class=" text-center">IPS</th>
					<th width="10%" class=" text-center">IPK</th>
					<th width="10%" class=" text-center">SKS MK</th>
					<th width="10%" class=" text-center">SKS TOT</th>
				</tr>
			</table>
		</div>
		<?php $no = 1 ?>
		<?php foreach ($hasil as $data): ?>
			<div class="main-box mybgcolor rounded bts-bwh2 bts-ats bg-light clearfix">
				<table width="100%">
					<tr style="width: 100%">
						<th width="5%" class=" text-center"><?php echo $no; ?>.</th>
						<td width="10%" ><?php echo $data->id_smt; ?></td>
						<td width="30%" class=""><?php echo $datamhs->nm_lemb; ?></td>
						<td width="15%" class=" text-center"><?php echo $data->id_stat_mhs; ?></td>
						<td width="10%" class=" text-center"><?php echo $data->ips; ?></td>
						<td width="10%" class=" text-center"><?php echo $data->ipk; ?></td>
						<td width="10%" class=" text-center"><?php echo $data->sks_smt; ?></td>
						<td width="10%" class=" text-center"><?php echo $data->sks_total; ?></td>
					</tr>
				</table>
			</div>
			<?php $no++ ?>
		<?php endforeach ?>
	</div>
</div>
