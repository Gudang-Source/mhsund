<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info m-0"><?php echo $title; ?></h5>
		<p class="text-secondary" style="font-size: 13px;">Menampilkan dan mengelola data matakuliah</p>
		<form action="<?php echo base_url('index.php/admin/matakuliah/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan Matakuliah atau Kode Matakuliah">
                        <small class="form-text text-muted">Gunakan Matakuliah atau Kode Matakuliah</small>
                    </div>
                </div>
            </div>
        </form>
        <table id="tblmhs" class="table" style="font-size: 13px;">
             <thead>
                <tr>
                   <th class="text-center">No</th>
                   <th>Kode Matakuliah</th>
                   <th>Nama Matakuliah</th>
                   <th class="text-center">Bobot</th>
                   <th>Program Studi</th>
                   <th>Jenis MK</th>
                   <th colspan="2"></th>
               </tr>
           </thead>
           <tbody>
            <?php $no = $offset+1 ?>
            <?php foreach ($hasil as $data): ?>
                <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><a href="<?php echo base_url('index.php/admin/matakuliah/detail/'.$data->id) ?>" class="text-info"><?php echo $data->kode_mk; ?></a></td>
                    <td><?php echo $data->nm_mk; ?></td>
                    <td class="text-center"><?php echo $data->sks_mk; ?></td>
                    <td><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></td>
                    <td>
                        <?php if (@$this->Matakuliah_m->detail_data($data->id)->a_wajib == 1 && @$this->Matakuliah_m->detail_data($data->id)->a_wajib !== NULL): ?>
                            <?php echo "Wajib Program Studi"; ?>
                            <?php else: ?>
                                <?php echo "Tidak wajib Program Studi"; ?>
                        <?php endif ?>
                    </td>
                    <td><a href="<?php echo base_url('index.php/admin/matakuliah/detail/'.$data->id) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
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