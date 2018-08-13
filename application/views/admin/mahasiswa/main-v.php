<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info m-0"><?php echo $title; ?></h5>
		<p class="text-secondary" style="font-size: 13px;">Menampilkan dan mengelola data mahasiswa</p>
		<hr/>
		<table id="tblmhs" class="table display" style="font-size: 12px;">
			<thead>
				<tr>
					<th>NO</th>
					<th>Nama Mahasiswa</th>
					<th>NIM</th>
					<th>L/P</th>
					<th>Agama</th>
					<th>Tgl Lahir</th>
					<th>Status</th>
					<th>Agnkatan</th>
					<th></th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
</div>
<script type="text/javascript">
    var save_method; //for save method string
    var table;
    $(document).ready(function() {
        //datatables
        table = $('#tblmhs').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            // Load data for the table's content from an Ajax source
            "ajax": {
            	"url": '<?php echo base_url('index.php/admin/mahasiswa/dtmhs'); ?>',
    	"type": "POST"
            },
            //Set column definition initialisation properties.
            "columns": [
            {"data": "nm_pd",width:100},
            {"data": "nim",width:100},
            {"data": "gender",width:100},
            {"data": "id_agama",width:100},
            {"data": "tgl_lahir",width:100},
            ],
        });
    });
</script>