<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info m-0"><?php echo $title; ?></h5>
		<p class="text-secondary" style="font-size: 13px;">Menampilkan dan mengelola data kurikulum</p>
		<form action="<?php echo base_url('index.php/admin/matakuliah/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan nama kurikulum">
                        <small class="form-text text-muted">Gunakan nama kurikulum</small>
                    </div>
                </div>
            </div>
        </form>
        <table id="tblmhs" class="table" style="font-size: 13px;">
             <thead>
                <tr class="table-info">
                   <th rowspan="2" class="text-center">No</th>
                   <th rowspan="2">Nama Kurikulum</th>
                   <th rowspan="2">Program Studi</th>
                   <th rowspan="2" class="text-center">Masa Berlaku</th>
                   <th colspan="3">Aturan Jumlah SKS</th>
                   <th colspan="2">Jumlah SKS Matakuliah</th>
                   <th rowspan="2" colspan="2"></th>
               </tr>
               <tr class="table-info">
                   <th class="text-center">lulus</th>
                   <th class="text-center">Wajib</th>
                   <th class="text-center">lulus</th>
                   <th class="text-center">wajib</th>
                   <th class="text-center">pilihan</th>
               </tr>
           </thead>
           <tbody>
            <?php $no = $offset+1 ?>
            <?php foreach ($hasil as $data): ?>
                <tr>
                    <td class="text-center"><?php echo $no; ?></td>
                    <td><a href="<?php echo base_url('index.php/admin/kurikulum/detail/'.$data->id) ?>" class="text-info"><?php echo $data->nm_kurikulum_sp; ?></a></td>
                    <td><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></td>
                    <td class="text-center"><?php echo $data->nm_smt; ?></td>
                    <td class="text-center"><?php echo $data->jml_sks_lulus; ?></td>
                    <td class="text-center"><?php echo $data->jml_sks_wajib; ?></td>
                    <td class="text-center"><?php echo $data->jml_sks_pilihan; ?></td>
                    <td class="text-center"><?php echo $data->jml_sks_wajib; ?></td>
                    <td class="text-center"><?php echo $data->jml_sks_pilihan; ?></td>
                    <td><a href="<?php echo base_url('index.php/admin/kurikulum/detail/') ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
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