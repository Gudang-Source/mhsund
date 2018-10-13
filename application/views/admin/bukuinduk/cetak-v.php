<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<link rel="shortcut icon" href="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt); ?>">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<?php foreach ($hasil as $data): ?>
		<div class="row">
			<div class="col">
				<table>
					<tr>
						<td><img src="<?php echo base_url('asset/img/lembaga/'.$infopt->logo_pt) ?>" width="100px"></td>
						<td class="text-center p-1" colspan="4"><h1><?php echo $title; ?></h1></td>
					</tr>
				</table>
				<table width="100%" border="1">
					<tr>
						<td colspan="4"><b>A. Data Program Studi</b></td>
					</tr>
					<tr>
						<td>Nama</td>
						<td class="text-center">:</td>
						<td><?php echo strtoupper($data->nm_pd); ?></td>
						<td rowspan="4" class="text-center"><img src="<?php echo base_url('asset/img/users/avatar.png') ?>" width="150px"></td>
					</tr>
					<tr>
						<td>NIPD / Nomor Stambuk</td>
						<td class="text-center">:</td>
						<td><?php echo strtoupper($data->nipd); ?></td>
					</tr>
					<tr>
						<td>Program Studi</td>
						<td class="text-center">:</td>
						<td><?php echo $data->nm_jenj_didik.' - '.$data->nm_lemb; ?></td>
					</tr>
					<tr>
						<td>Jenis Daftar</td>
						<td class="text-center">:</td>
						<td><?php echo $this->Admin_m->detail_data('jenis_pendaftaran','id_jns_daftar',$data->id_jns_daftar)->nm_jns_daftar; ?></td>
					</tr>
					<tr>
						<td>Periode Pendaftaran</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo $this->Admin_m->detail_data('semester','id_smt',$data->mulai_smt)->nm_smt; ?></td>
					</tr>
					<tr>
						<td colspan="4"><b>B. Data Diri</b></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo strtoupper($data->nm_pd); ?></td>
					</tr>
					<tr>
						<td>Tempat Tanggal Lahir</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo $data->tmpt_lahir.' / '.$data->tgl_lahir; ?></td>
					</tr>
					<tr>
						<td>Jenis Kelamin</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo $data->jk; ?></td>
					</tr>
					<tr>
						<td>Agama</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo $this->Admin_m->detail_data('agama','id_agama',$data->id_agama)->nm_agama; ?></td>
					</tr>
					<tr>
						<td colspan="4"><b>C. Data Orang Tua</b></td>
					</tr>
					<tr>
						<td>Nama Ibu Kandung</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo strtoupper($data->nm_ibu_kandung); ?></td>
					</tr>
					<tr>
					  <td>Jenjang Pendidikan Ibu kandung</td>
					  <td class="text-center">:</td>
					  <td colspan="2"><?php echo strtoupper($this->Admin_m->detail_data('jenjang_pendidikan','id_jenj_didik',$data->id_jenjang_pendidikan_ibu)->nm_jenj_didik); ?></td>
					</tr>
					<tr>
					  <td >Pekerjaan Ibu kandung</td>
					  <td class="text-center">:</td>
					  <td colspan="2"><?php echo strtoupper($this->Admin_m->detail_data('pekerjaan','id_pekerjaan',$data->id_pekerjaan_ibu)->nm_pekerjaan); ?></td>
					</tr>
					<tr>
					  <td >Penghasilan Ibu kandung</td>
					  <td class="text-center">:</td>
					  <td colspan="2" ><?php echo strtoupper($this->Admin_m->detail_data('penghasilan','id_penghasilan',$data->id_penghasilan_ibu)->nm_penghasilan); ?></td>
					</tr>
					<tr>
						<td>Nama Ayah</td>
						<td class="text-center">:</td>
						<td colspan="2"><?php echo strtoupper($data->nm_ayah); ?></td>
					</tr>
					<tr>
					  <td>Jenjang Pendidikan Ayah</td>
					  <td class="text-center">:</td>
					  <td colspan="2"><?php echo strtoupper($this->Admin_m->detail_data('jenjang_pendidikan','id_jenj_didik',$data->id_jenjang_pendidikan_ayah)->nm_jenj_didik); ?></td>
					</tr>
					<tr>
					  <td >Pekerjaan Ayah</td>
					  <td class="text-center">:</td>
					  <td colspan="2"><?php echo strtoupper($this->Admin_m->detail_data('pekerjaan','id_pekerjaan',$data->id_pekerjaan_ayah)->nm_pekerjaan); ?></td>
					</tr>
					<tr>
					  <td >Penghasilan Ayah</td>
					  <td class="text-center">:</td>
					  <td colspan="2" ><?php echo strtoupper($this->Admin_m->detail_data('penghasilan','id_penghasilan',$data->id_penghasilan_ayah)->nm_penghasilan); ?></td>
					</tr>
				</table>
			</div>
		</div>
		<?php exit(); ?>
		<div style="page-break-after: always;"></div>
	<?php endforeach ?>
</body>
</html>