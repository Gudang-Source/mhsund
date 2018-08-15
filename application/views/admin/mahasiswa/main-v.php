<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info m-0"><?php echo $title; ?></h5>
		<p class="text-secondary" style="font-size: 13px;">Menampilkan dan mengelola data mahasiswa</p>
		<form action="<?php echo base_url('index.php/admin/mahasiswa/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan Nama atau NIM Mahasiswa">
                        <small class="form-text text-muted">Gunakan nama atau NIM Mahasiswa</small>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-tag"></i> Berdasarkan Prodi</label>
                        <select class="form-control form-control-sm" name="prodi" onchange="this.form.submit()">
                            <option value="">-- Semua Prodi --</option>
                            <?php foreach ($prodi as $data): ?>
                                <option value="<?php echo $data->kode_prodi ?>"><?php echo strtoupper($data->nm_jenj_didik.' '.$data->nm_lemb); ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="form-text text-muted">Pilih dari salah satu data yang ada</small>
                    </div>
                </div>
                </div>
            </div>
        </form>
        <table id="tblmhs" class="table" style="font-size: 13px;">
             <thead>
                <tr>
                   <th class="text-center">No</th>
                   <th>Nama Mahasiswa</th>
                   <th>NIM</th>
                   <th class="text-center">L/P</th>
                   <th>Tgl Lahir</th>
                   <th>Agama</th>
                   <th>Program Studi</th>
                   <th class="text-center">Angkatan</th>
                   <th colspan="2"></th>
               </tr>
           </thead>
           <tbody>
            <?php $no = $offset+1 ?>
            <?php foreach ($hasil as $data): ?>
                <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><a href="<?php echo base_url('index.php/admin/mahasiswa/detail/'.$data->idmhs) ?>" class="text-dark"><?php echo $data->nm_pd; ?></a></td>
                    <td><?php echo $data->nipd; ?></td>
                    <td class="text-center"><?php echo $data->jk; ?></td>
                    <td><?php echo $data->tgl_lahir; ?></td>
                    <td><?php echo strtoupper($data->nm_agama); ?></td>
                    <td><?php echo strtoupper($data->nm_jenj_didik.' '.$data->nm_lemb); ?></td>
                    <td class="text-center"><?php echo substr($data->mulai_smt,0,4); ?></td>
                    <td><a href="<?php echo base_url('index.php/admin/mahasiswa/detail/'.$data->idmhs) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
                    <td><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
                </tr>
                <?php $no++ ?>
                <?php endforeach ?>         
            </tbody>
        </table>
        <div class="row mt-2">
            <div class="col">
                <!--Tampilkan pagination-->
                <?php echo $pagination; ?>
            </div>
        </div>
    </div>
</div>