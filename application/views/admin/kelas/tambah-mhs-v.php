<div class="card mt-4">
	<div class="card-body">
		<form action="<?php echo base_url('index.php/admin/kelas/tmbhmhsbanyak/'.$nmkls->id_kelas) ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian Berdasarkan Nama</label>
                        <input type="text" name="nama" class="form-control form-control-sm" placeholder="Masukan nama mahasiswa atau nomor stambuk">
                        <small class="form-text text-muted">Gunakan nama Mahasiswa atau NIM</small>
                    </div>
                </div>
                 <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian Berdasarkan Angkatan</label>
                        <input type="text" name="angkatan" class="form-control form-control-sm" placeholder="Masukan Angkatan">
                        <small class="form-text text-muted">Gunakan Semester</small>
                    </div>
                </div>
                <div class="col">
                	<label>&nbsp;</label><br/>
                	<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm">Cari</button>
                </div>
            </div>
        </form>
		<form action="<?php echo base_url('index.php/admin/kelas/prosesaddmhs/') ?>" method="post">
			<table border="1" width="100%" class="bts-ats">
				<thead>
					<tr class="table-info">
						<th rowspan="2" class="text-center px-1"></th>
						<th rowspan="2" class="text-center px-1">No</th>
						<th rowspan="2" class="text-center px-1">NIPD</th>
						<th rowspan="2" class="text-center px-1">Nama</th>
						<th rowspan="2" class="text-center px-1">Angkatan</th>
						<th colspan="2" class="text-center p-1">Tempat Tanggal Lahir</th>
					<tr class="table-info">
						<th class="text-center p-1">Tempat</th>
						<th class="text-center p-1">Tanggal</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = $offset+1; ?>
					<?php foreach ($hasil as $data): ?>
						<tr>
							<td class="text-center p-1"><input type="checkbox" class="pilih" name="pilih[]" value="<?php echo $data->id_mhs_pt ?>"></td>
							<td class="text-center p-1"><?php echo $no; ?></td>
							<td class="text-center p-1"><?php echo $data->nipd; ?></td>
							<td class="p-1"><?php echo strtoupper($data->nm_pd); ?></td>
							<td class="text-center p-1"><?php echo $data->mulai_smt; ?></td>
							<td class="p-1"><?php echo $data->tmpt_lahir; ?></td>
							<td class="text-center p-1"><?php echo $data->tgl_lahir; ?></td>
						</tr>
						<?php $no++ ?>
					<?php endforeach ?>
				</tbody>
			</table>
			<div>
				<button type="submit" name="submit" value="submit" class="btn btn-success bts-ats">Tambah Mahasiswa</button>
				<div class="sambungfloat"></div>
			</div>
		</form>
		<div class="row">
			<div class="col"><?php echo $pagination; ?></div>
		</div>
		
	</div>
</div>