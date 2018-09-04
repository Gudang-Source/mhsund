<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<table width="100%">
			<tr>
				<td class="text-center">
					<img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px">
				</td>
				<td class="text-center">
					<h2 class="m-0"><b><?php echo strtoupper('Kartu Rencana Studi (KRS)'.' '.$datamhs->nm_jenj_didik.' '.$datamhs->nm_lemb.'<br/>'.$infopt->nama_info_pt); ?></b></h2><br/>
					<div class="m-0" style="font-size: 13px;">
						<?php echo strtoupper($infopt->alamat_pt).' - '.$infopt->kontak_1.' - '.$infopt->kontak_2.'<br/>'.$infopt->kontak_3.' - '.$infopt->kontak_4; ?>
					</div>
				</td>
			</tr>
		</table>
		<div class="row mt-4">
			<div class="col">
				<table>
					<tr>
						<td class="px-2">NAMA</td>
						<td class="px-2">:</td>
						<td class="px-2"><?php echo strtoupper($datamhs->nm_pd); ?></td>
					</tr>
					<tr>
						<td class="px-2">STAMBUK</td>
						<td class="px-2">:</td>
						<td class="px-2"><?php echo strtoupper($datamhs->nipd); ?></td>
					</tr>
					<tr>
						<td class="px-2">ANGKATAN</td>
						<td class="px-2">:</td>
						<td class="px-2"><?php echo strtoupper($datamhs->mulai_smt); ?></td>
					</tr>
				</table>
			</div>
			<div class="col">
				<table>
					<tr>
						<td class="px-2">PROGRAM STUDI</td>
						<td class="px-2">:</td>
						<td class="px-2"><?php echo strtoupper($datamhs->nm_jenj_didik.' '.$datamhs->nm_lemb); ?></td>
					</tr>
					<tr>
						<td class="px-2">SEMESTER</td>
						<td class="px-2">:</td>
						<td class="px-2"><?php echo strtoupper($smt); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<table border="1" class="mt-4" width="100%">
			<thead>
				<tr>
					<th class="p-2 text-center">NO</th>
					<th class="p-2 text-center">KODE</th>
					<th class="p-2">MATAKULIAH</th>
					<th class="p-2 text-center">SKS</th>
					<th class="p-2 text-center">KET</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1 ?>
				<?php foreach ($hasil as $data): ?>
					<tr>
						<td class="p-2 text-center"><?php echo $no; ?></td>
						<td class="p-2 text-center"><?php echo $data->kode_mk; ?></td>
						<td class="p-2"><?php echo $data->nm_mk; ?></td>
						<td class="p-2 text-center"><?php echo $data->sks_mk; ?></td>
						<td class="p-2"></td>
					</tr>
					<?php $no++ ?>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</body>
</html>