<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<table width="100%" border="1">
			<tr>
				<td colspan="4" class="text-center p-1">
					<h4>Daftar Akun Mahasiswa<br/><?php echo $detail->nm_jenj_didik.' '.$detail->nm_lemb.' <br/>Angkatan '.$angkatan; ?></h4>
				</td>
			</tr>
			<tr>
				<td class="text-center p-1">No</td>
				<td class="text-center p-1">NIM</td>
				<td class="text-center p-1">Nama Mahasiswa</td>
				<td class="text-center p-1">Password</td>
			</tr>
			<?php $no = 1 ?>
			<?php foreach ($hasil as $data): ?>
				<tr>
					<td class="text-center p-1"><?php echo $no; ?></td>
					<td class="text-center p-1"><?php echo $data->nipd; ?></td>
					<td class="py-1 px-4"><?php echo strtoupper($data->nm_pd); ?></td>
					<td class="text-center p-1"><?php echo $data->repassword; ?></td>
				</tr>
				<?php $no++ ?>
			<?php endforeach ?>
		</table>
	</div>
</body>
</html>