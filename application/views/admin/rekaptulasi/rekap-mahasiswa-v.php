<div class="card mt-4">
	<div class="card-body">
		<?php echo $title; ?><hr/>
		 <?php if ($this->session->flashdata('export')): ?>
		    <div class="bts-ats">
		        <div class="alert alert-success"><b><?php echo ucwords($this->session->flashdata('export'));?></b></div>
		    </div>
		<?php endif ?>
		<div class="card mt-4">
			<div class="card-body">
				<form action="<?php echo base_url('index.php/admin/rekaptulasi/export_excel_mhs') ?>" method="post">
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
							<button type="submit" name="submit" value="submit" class="btn btn-success">Export data mahasiswa</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="card mt-4">
	<div class="card-body">
		Update Data Mahasiswa Menggunakan Excel<hr/>
		<form action="<?php echo base_url('index.php/admin/rekaptulasi/proses_update_data_mhs/') ?>" method="post" enctype="multipart/form-data">
			<div class="custom-file">
			  <input type="file" name="semester" class="custom-file-input" id="fffiel">
			  <label class="custom-file-label" for="fffiel">Pilih File Excel</label>
			</div>
			<div class="alert border border-danger mt-2 text-danger">
				<i class="ti ti-alert"></i> <b>PERHATIAN !</b> Fitur ini digunakan untuk mengupdate / mengubah data mahasiswa yang memiliki kekeliruan dengan NIM/STAMBUK sebagai kata kunci utama, Pastikan NIM atau stambuk sudah sesuai agar data dapat berubah, untuk Melakukan Update menggunakan Fitur Upload Excel ini harus sesuai dengan format yang dapat du unduh disini.
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-success btn-sm"><i class="ti ti-upload"></i> Update Data Mahasiswa</button>
		</form>
	</div>
</div>