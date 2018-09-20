<div class="card mt-4">
    <div class="card">
        <div class="card-body">
             <button class="btn btn-outline-dark mtb-4" data-toggle="modal" data-target="#inputexcel"><i class="ti ti-plus"></i> Menggunakan Excel</button>
             <?php if ($this->session->flashdata('export')): ?>
                <div class="bts-ats">
                    <div class="alert alert-success"><b><?php echo ucwords($this->session->flashdata('export'));?></b></div>
                </div>
            <?php endif ?>
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
<!-- Modal -->
<div class="modal fade" id="inputexcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Mahasiswa baru menggunakan data excel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('index.php/admin/exportmhs/index/'); ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
                <label>Masukan File Exel</label>
                <input type="file" name="semester" class="form-control" placeholder="File.exl">
                <div class="alert alert-info mt-2" role="alert">
                  <b>PERHATIAN</b> Fitur ini hanya digunakan untuk memasukan data mahasiswa baru berdasarkan data dari website PMB, selain itu sistem akan menolak data yang dimasukan.
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" value="submit" name="submit" class="btn btn-outline-success">Upload file Excel</button>
          </div>
      </form>
    </div>
  </div>
</div>