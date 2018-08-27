<div class="card mt-4">
    <div class="card">
        <div class="card-body">
            <form action="<?php echo base_url('index.php/admin/mahasiswa/tmbh_mhs_pmb') ?>" method="post">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label><i class="ti ti-search"></i> Pencarian Peserta Calon Mahasiswa Baru</label>
                            <input type="text" name="string" class="form-control form-control-sm" placeholder="Gunakan nama atau Noreg Peserta">
                            <small class="form-text text-muted">Gunakan nama atau Noreg Peserta</small>
                        </div>
                    </div>
                </div>
            </form>
            <table class="table" style="font-size: 13px">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Noreg</th>
                        <th>Nama Lengkap</th>
                        <th>Tahun</th>
                        <th>Gel</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($hasil == TRUE): ?>
                        <?php $no = 1 ?>
                        <?php foreach ($hasil as $data): ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data->noreg; ?></td>
                                <td><a class="text-info" href="<?php echo base_url('index.php/admin/mahasiswa/detail_mhs_pmb/'.$data->id_mhs) ?>"><?php echo strtoupper($data->nama_mhs); ?></a></td>
                                <td><?php echo $data->angkatan; ?></td>
                                <td><?php echo $data->gelombang; ?></td>
                                <td>
                                    <?php if ($data->pembayaran == 1): ?>
                                        <span class="text-success">Sudah melakukan pembyaran PMB</span>
                                        <?php else: ?>
                                            <span class="text-secondary">Belum melakukan pembyaran PMB</span>
                                    <?php endif ?>
                                </td>
                                <td><a href="<?php echo base_url('index.php/admin/mahasiswa/detail_mhs_pmb/'.$data->id_mhs) ?>" class="text-info"><i class="ti ti-plus"></i> Tambahkan</a></td>
                            </tr>
                            <?php $no++ ?>
                        <?php endforeach ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data ditemukan</td>
                            </tr>
                    <?php endif ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>