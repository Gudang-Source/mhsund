<div class="card mt-4">
	<div class="card-body">
		<h5 class="text-info m-0"><?php echo $title; ?></h5>
		<p class="text-secondary" style="font-size: 13px;">Menampilkan dan mengelola data mahasiswa</p>
    <?php if ($this->ion_auth->is_admin()): ?>
      <div class="dropdown mb-2">
        <button type="button" class="btn btn-success dropdown-toggle" id="pmb" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="10,20">
          Tambah Mahasiswa
        </button>
        <div class="dropdown-menu" aria-labelledby="pmb">
          <a class="dropdown-item" href="<?php echo base_url('index.php/admin/mahasiswa/tmbh_mhs_pmb/') ?>">Dari penerimaan Mahasiswa Baru</a>
          <a class="dropdown-item" href="#">Masukan data manual</a>
        </div>
      </div>
    <?php endif ?>
		<form action="<?php echo base_url('index.php/admin/mahasiswa/') ?>" method="get">
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label><i class="ti ti-search"></i> Pencarian</label>
                        <input type="text" name="string" class="form-control form-control-sm" placeholder="Masukan Nama atau NIM Mahasiswa">
                        <small class="form-text text-muted">Gunakan nama atau NIM Mahasiswa</small>
                    </div>
                </div>
                <?php if ($this->ion_auth->is_admin()): ?>
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
                <?php endif ?>
            </div>
        </form>
        <table id="tblmhs" border="1" width="100%" style="font-size: 13px;">
             <thead>
                <tr class="table-info">
                   <td class="text-center p-1">No</td>
                   <td class="text-center p-1">NIM</td>
                   <td class="text-center p-1">Nama Mahasiswa</td>
                   <td class="text-center p-1">L/P</td>
                   <td class="text-center p-1">Tgl Lahir</td>
                   <td class="text-center p-1">Agama</td>
                   <td class="text-center p-1">Program Studi</td>
                   <td class="text-center p-1">Angkatan</td>
                   <td class="text-center p-1" colspan="2"></td>
               </tr>
           </thead>
           <tbody>
            <?php $no = $offset+1 ?>
            <?php foreach ($hasil as $data): ?>
                <tr>
                    <td class="text-center p-1"><?php echo $no; ?></td>
                    <td class="text-center p-1"><?php echo $data->nipd; ?></td>
                    <td class="p-1"><a href="<?php echo base_url('index.php/admin/mahasiswa/detail/'.$data->idmhs) ?>" class="text-dark"><?php echo $data->nm_pd; ?></a></td>
                    <td class="text-center p-1"><?php echo $data->jk; ?></td>
                    <td class="text-center p-1"><?php echo $data->tgl_lahir; ?></td>
                    <td class="text-center p-1"><?php echo strtoupper($data->nm_agama); ?></td>
                    <td class="p-1"><?php echo strtoupper($data->nm_jenj_didik.' '.$data->nm_lemb); ?></td>
                    <td class="text-center p-1"><?php echo substr($data->mulai_smt,0,4); ?></td>
                    <td class="p-1"><a href="<?php echo base_url('index.php/admin/mahasiswa/detail/'.$data->idmhs) ?>" class="text-info"><i class="ti ti-pencil"></i></a></td>
                    <td class="p-1"><a href="#" class="text-danger"><i class="ti ti-trash"></i></a></td>
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