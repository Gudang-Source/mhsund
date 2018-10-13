<div class="card mt-4">
	<div class="card-body">
		Buku Induk Mahasiswa <hr/>
		<form action="<?php echo base_url('index.php/admin/bukuinduk/cetak_bukuinduk/') ?>" method="post">
			<div class="row">
				<div class="col">
					<div class="form-group">
					    <label>Program Studi</label>
					    <select name="prodi" class="form-control">
					    	<?php foreach ($prodi as $data): ?>
					    		<option value="<?php echo $data->kode_prodi ?>"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></option>
					    	<?php endforeach ?>
					    </select>
					    <small id="emailHelp" class="form-text text-muted">Pilih salah satu prodi</small>
					  </div>
				</div>
				<div class="col">
					<div class="form-group">
					    <label>Angkatan</label>
					    <select name="angkatan" class="form-control">
					    	<?php foreach ($angkatan as $data): ?>
					    		<option value="<?php echo $data->id_thn_ajaran ?>"><?php echo $data->id_thn_ajaran; ?></option>
					    	<?php endforeach ?>
					    </select>
					    <small id="emailHelp" class="form-text text-muted">Pilih Angkatan</small>
					  </div>
				</div>
				<div class="col">
					<label>&nbsp;</label><br/>
					<button type="submit" name="submit" value="submit" class="btn btn-success"><i class="ti ti-printer"></i> Cetak Buku Induk Mahasiswa</button>
				</div>
			</div>
		</form>
	</div>
</div>