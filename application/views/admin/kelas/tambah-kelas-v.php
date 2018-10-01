<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<style type="text/css">
	.autocomplete-suggestions{
		background-color: white;
		border: 1px solid #eeeeee;
		font-size: 13px;
		padding: 14px;
	}
</style>
<script type="text/javascript" src="<?php echo base_url('asset/js/autocomplete.js') ?>"></script>
<div class="card mt-4">
	<div class="card-body">
		<form action="<?php echo base_url('index.php/admin/kelas/proses_input_kelas') ?>" method="post" id="addmat">
			<div class="form-group">
				<label>Program Studi</label>
				<select class="form-control" name="id_sms">
					<?php foreach ($prodi as $data): ?>
						<option value="<?php echo $data->id_sms ?>"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></option>
					<?php endforeach ?>
				</select>
				<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Matakuliah</label>
						<input type="text" class="form-control" placeholder="ketik kode atau nama matakuliah" name="matakuliah" id="matakuliah" value="">
						<input type="hidden" name="id_mk_siakad" id="id_mk_siakad">
						<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Semester</label>
						<select class="form-control" name="id_smt">
							<?php foreach ($semester as $data): ?>
								<option value="<?php echo $data->id_smt ?>"><?php echo $data->id_smt.' - '.$data->nm_smt; ?></option>
							<?php endforeach ?>
						</select>
						<small class="form-text text-muted">Pilih dari salah satu data diatas</small>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Nama Kelas</label>
				<input type="text" class="form-control" name="nm_kls" placeholder="Masukan Nama Kelas">
				<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
			</div>
			<div class="form-group">
				<label>Bahasan</label>
				<textarea class="form-control" name="bahasan_case" placeholder="Masukan bahasan"></textarea>
				<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
			</div>
			<div class="row">
				<div class="col">
					<div class="form-group">
						<label>Tanggal Mullai</label>
						<input type="text" class="form-control" name="tgl_mulai_koas" placeholder="Masukan Nama Kelas" value="<?php echo date('Y-m-d') ?>">
						<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<label>Tanggal Selesai</label>
						<input type="text" class="form-control" name="tgl_selesai_koas" placeholder="masukan tanggal selesai">
						<small class="form-text text-muted">hanya dapat menggunakan angka dan huruf</small>
					</div>
				</div>
			</div>
			<button type="submit" class="btn btn-success mt-4" id="tombol"><i class="ti ti-plus"></i> Simpan Data</button>
		</form>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
    	// var valinputmk = $("#matakuliah").val();
        // Selector input yang akan menampilkan autocomplete.
        $( "#matakuliah" ).autocomplete({
            serviceUrl: "<?php echo base_url('index.php/admin/kelas/getmk/'); ?>",   // Kode php untuk prosesing data
            dataType: "JSON",           // Tipe data JSON
            onSelect: function (suggestion) {
                $( "#matakuliah" ).val(suggestion.kode_mk + " - " + suggestion.nm_mk);
                $( "#id_mk_siakad" ).val(suggestion.idmk);
            }
        });
    })
</script>