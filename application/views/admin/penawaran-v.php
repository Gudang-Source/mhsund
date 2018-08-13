<div class="row">
	<div class="col-8">
		<div class="card mt-2">
			<div class="card-body">
				<h5 class="card-title text-info">Penawaran Matakuliah</h5><hr/>
				<span class="text-success">Saat ini anda berada di Semester <?php echo $smt; ?></span>
				<div id="listmk"></div>
				
			</div>
		</div>
	</div>
	<div class="col-4">
		<div class="card mt-2">
			<div class="card-body">
				<h5 class="card-title text-info">Matakuliah diambil</h5><hr/>
				<div id="addmklist" href="<?php echo base_url('index.php/admin/penawaran/showmkadd/'.$datamhs->idmhs.'/'.$lastsmt->id_smt) ?>">
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#listmk').html('Memuat data ...');
		$("#listmk").load("<?php echo base_url('index.php/admin/penawaran/listmk/'.$datamhs->idmhs.'/'.$lastsmt->id_smt.'/'.$kuri.'/'.$aksmt) ?>");
		// 
		$('#addmklist').html('Memuat data ...');
		$("#addmklist").load("<?php echo base_url('index.php/admin/penawaran/showmkadd/'.$datamhs->idmhs.'/'.$lastsmt->id_smt) ?>");
	});
	function ambilmk(kode){
		var data = $('#inputan'+kode).serialize();

		$.ajax({
			type: 'POST',
			url: "<?php echo base_url('index.php/admin/penawaran/inputmk/') ?>",
			data: data,
			success: function() {
				$('#listmk').html('harap tunggu sedang memuat Ulang data ...');
				$("#listmk").load("<?php echo base_url('index.php/admin/penawaran/listmk/'.$datamhs->idmhs.'/'.$lastsmt->id_smt.'/'.$kuri.'/'.$aksmt) ?>");
				// 
				$('#addmklist').html('harap tunggu sedang memuat ulang data ...');
				$("#addmklist").load("<?php echo base_url('index.php/admin/penawaran/showmkadd/'.$datamhs->idmhs.'/'.$lastsmt->id_smt) ?>");
			}
		})
	};
	function deletemk(id){
		$.ajax({
			type: 'POST',
			url: "<?php echo base_url('index.php/admin/penawaran/hapusmk/') ?>"+id,
			success: function() {
				$('#listmk').html('harap tunggu sedang memuat Ulang data ...');
				$("#listmk").load("<?php echo base_url('index.php/admin/penawaran/listmk/'.$datamhs->idmhs.'/'.$lastsmt->id_smt.'/'.$kuri.'/'.$aksmt) ?>");
				// 
				$('#addmklist').html('harap tunggu sedang memuat ulang data ...');
				$("#addmklist").load("<?php echo base_url('index.php/admin/penawaran/showmkadd/'.$datamhs->idmhs.'/'.$lastsmt->id_smt) ?>");
			}
		})
	};
</script>