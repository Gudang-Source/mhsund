<div class="navbox">
	<h6 class="text-secondary">Navigator</h6>
	<ul class="navbar-nav mr-auto">
		<a href="<?php echo base_url('index.php/admin/mahasiswa/detail/'.$datamhs->idmhs) ?>"><li class="p-2 text-dark" style="font-size: 13px;"><i class="ti ti-user text-info"></i> Detail Mahasiswa</li></a>
		<a href="<?php echo base_url('index.php/admin/mahasiswa/histori_pendidikan/'.$datamhs->idmhs) ?>"><li class="p-2 text-dark" style="font-size: 13px;"><i class="ti ti-desktop text-info"></i> History Pendidikan</li></a>
		<a href="<?php echo base_url('index.php/admin/mahasiswa/krs/'.$datamhs->idmhs) ?>"><li class="p-2 text-dark" style="font-size: 13px;"><i class="ti ti-book text-info"></i> KRS Mahasiswa</li></a>
		<a href="<?php echo base_url('index.php/admin/mahasiswa/nilai/'.$datamhs->idmhs) ?>"><li class="p-2 text-dark" style="font-size: 13px;"><i class="ti ti-bookmark-alt text-info"></i> Histori Nilai</li></a>
		<a href="<?php echo base_url('index.php/admin/mahasiswa/kuliah_mahasiswa/'.$datamhs->idmhs) ?>"><li class="p-2 text-dark" style="font-size: 13px;"><i class="ti ti-bookmark-alt text-info"></i> Aktivitas Perkuliahan</li></a>
		<a href="<?php echo base_url('index.php/admin/mahasiswa/prestasi/'.$datamhs->idmhs) ?>"><li class="p-2 text-dark" style="font-size: 13px;"><i class="ti ti-cup text-info"></i> Perstasi <span class="border border-success rounded p-1" style="font-size: 12px;">soon</span></li></a>
	</ul>
</div>