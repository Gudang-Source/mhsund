<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info m-0"><?php echo $title; ?></h5>
		<p class="text-secondary" style="font-size: 13px;">Menampilkan dan mengelola data kurikulum</p>
		<form action="<?php echo base_url('index.php/admin/Kurikulum/index/') ?>" method="get">
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
        <table id="tblmhs" border="1" width="100%" style="font-size: 13px;">
             <thead>
                <tr class="table-info">
                   <th rowspan="2" class="text-center p-1">No</th>
                   <th rowspan="2" class="text-center p-1">Nama Kurikulum</th>
                   <th rowspan="2" class="text-center p-1">Program Studi</th>
                   <th rowspan="2" class="text-center p-1">Masa Berlaku</th>
                   <th colspan="3" class="text-center p-1">Aturan Jumlah SKS</th>
                   <th colspan="2" class="text-center p-1">Jumlah SKS Matakuliah</th>
                   <th rowspan="2" colspan="2" class="text-center p-1"></th>
               </tr>
               <tr class="table-info">
                   <th class="text-center p-1">lulus</th>
                   <th class="text-center p-1">Wajib</th>
                   <th class="text-center p-1">lulus</th>
                   <th class="text-center p-1">wajib</th>
                   <th class="text-center p-1">pilihan</th>
               </tr>
           </thead>
           <tbody>
            <?php $no = $offset+1 ?>
            <?php foreach ($hasil as $data): ?>
                <tr>
                    <td class="text-center p-1"><?php echo $no; ?></td>
                    <td class="p-1"><a href="<?php echo base_url('index.php/admin/kurikulum/detail/'.$data->idkur) ?>" class="text-info"><?php echo $data->nm_kurikulum_sp; ?></a></td>
                    <td class="p-1"><?php echo $data->nm_jenj_didik.' '.$data->nm_lemb; ?></td>
                    <td class="text-center p-1"><?php echo $data->nm_smt; ?></td>
                    <td class="text-center p-1"><?php echo $data->jml_sks_lulus; ?></td>
                    <td class="text-center p-1"><?php echo $data->jml_sks_wajib; ?></td>
                    <td class="text-center p-1"><?php echo $data->jml_sks_pilihan; ?></td>
                    <td class="text-center p-1"><?php echo $data->jml_sks_wajib; ?></td>
                    <td class="text-center p-1"><?php echo $data->jml_sks_pilihan; ?></td>
                    <td class="p-1"><a href="<?php echo base_url('index.php/admin/kurikulum/detail/') ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
                    <td class="p-1">
                        <?php if ($data->id_kurikulum_sp !== NULL): ?>
                            <a href="#" data-toggle="tooltip" title="Tidak dapat dihapus"><i class="ti ti-trash text-secondary" ></i></a>
                        <?php endif ?>
                    </td>
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