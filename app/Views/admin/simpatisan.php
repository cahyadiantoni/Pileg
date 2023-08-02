<?= view('layout/sidebar') ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Simpatisan</h1>
          <p>Menampilkan Data Desa pada Pemilihan Kepala Daerah</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Simpatisan</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="box-header with-border">
                <?php if($is_login){ ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                      + Tambah Simpatisan
                  </button>
                <?php } ?>
              </div>
              <br>
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>No HP</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Kader</th>
                    <th style="width: 120px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach($dataSimpatisan as $data){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?php 
                        if($data->id < 10){
                            echo "SMPT00" . $data->id;
                        }else if($data->id < 100){
                            echo "SMPT0" . $data->id;
                        }else if($data->id < 1000){
                            echo "SMPT" . $data->id;
                        }
                    ?></td>
                    <td><?= $data->nik ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->hp ?></td>
                    <td><?= $data->desa ?></td>
                    <td><?= $data->kecamatan ?></td>
                    <td><?php 
                        if($data->id_kader < 10){
                            echo "KDR00" . $data->id;
                        }else if($data->id_kader < 100){
                            echo "KDR0" . $data->id;
                        }else if($data->id_kader < 1000){
                            echo "KDR" . $data->id;
                        }
                    ?></td>
                    <td>
                      <?php if($is_login){ ?>
                        <button type="button" data-toggle="modal" data-target="#edit<?= $data->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                        <a href="<?= base_url('Admin/DataSimpatisanController/hapus') ?>/<?= $data->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                      <?php }?>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- modal tambah -->
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Simpatisan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DataSimpatisanController/tambah'); ?>" method="post">
                <div class="form-group">
                <label for="nik">NIK</label>
                <input class="form-control" name="nik" id="nik" type="number">
                </div>
                <div class="form-group">
                <label for="nama">Nama</label>
                <input class="form-control" name="nama" id="nama" type="text" placeholder="Masukan Nama">
                </div>
                <div class="form-group">
                    <label for="hp">Nomor HP</label>
                    <input class="form-control" name="hp" id="hp" type="number">
                </div>
                <div class="form-group">
                <label for="desa">Desa</label>
                  <select class="form-control" id="desa" name="desa">
                    <option value="null">Pilih Desa</option>
                    <?php foreach($dataDesa as $data){?>
                    <option value="<?= $data->nama_desa ?>"><?= $data->nama_desa ?></option>
                    <?php } ?>
                  </select>
                <!-- <input class="form-control" name="desa" id="desa" type="text" placeholder="Masukan Desa"> -->
                </div>
                <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                  <select class="form-control" id="kecamatan" name="kecamatan">
                    <option value="null">Pilih Kecamatan</option>
                    <?php foreach($dataDesa as $data){?>
                    <option value="<?= $data->nama_kecamatan ?>"><?= $data->nama_kecamatan ?></option>
                    <?php } ?>
                  </select>
                <!-- <input class="form-control" name="kecamatan" id="kecamatan" type="text" placeholder="Masukan Kecamatan"> -->
                </div>
                <div class="form-group">
                <label for="id_kader">Kader</label>
                <select class="form-control" id="id_kader" name="id_kader">
                      <option value="0">Pilih Kader</option>
                      <?php foreach($dataKader as $kader){?>
                      <option value="<?= $kader->id ?>"><?= $kader->nama ?></option>
                      <?php } ?>
                </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Kader</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- modal edit -->
    <?php foreach($dataSimpatisan as $data){ ?>
    <div class="modal fade" id="edit<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Simpatisan <?= $data->nama ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DataSimpatisanController/edit'); ?>" method="post">
                <input type="hidden" value="<?= $data->id ?>" name="id">
                <div class="form-group">
                    <label for="nik">NIK</label>
                    <input class="form-control" name="nik" id="nik" type="number" value="<?= $data->nik ?>">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input class="form-control" name="nama" id="nama" type="text" value="<?= $data->nama ?>">
                </div>
                <div class="form-group">
                    <label for="hp">Nomor HP</label>
                    <input class="form-control" name="hp" id="hp" type="number" value="<?= $data->hp ?>">
                </div>
                <div class="form-group">
                    <label for="desa">Desa</label>
                    <select class="form-control" id="desa" name="desa">
                      <option value="<?= $data->desa ?>">Pilih Desa</option>
                      <?php foreach($dataDesa as $desa){
                        if($data->desa == $desa->nama_desa){ ?>
                        <option value="<?= $desa->nama_desa ?>" selected><?= $desa->nama_desa ?></option>
                        <?php }else{ ?>
                        <option value="<?= $desa->nama_desa ?>"><?= $desa->nama_desa ?></option>
                      <?php }} ?>
                    </select>
                    <!-- <input class="form-control" name="desa" id="desa" type="text" value="<?= $data->desa ?>"> -->
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <select class="form-control" id="kecamatan" name="kecamatan">
                      <option value="<?= $data->kecamatan ?>">Pilih Kecamatan</option>
                      <?php foreach($dataDesa as $desa){
                        if($data->kecamatan == $desa->nama_kecamatan){ ?>
                        <option value="<?= $desa->nama_kecamatan ?>" selected><?= $desa->nama_kecamatan ?></option>
                        <?php }else{ ?>
                        <option value="<?= $desa->nama_kecamatan ?>"><?= $desa->nama_kecamatan ?></option>
                      <?php }} ?>
                    </select>
                    <!-- <input class="form-control" name="kecamatan" id="kecamatan" type="text" value="<?= $data->kecamatan ?>"> -->
                </div>
                <div class="form-group">
                    <label for="id_kader">Kader</label>
                    <select class="form-control" id="id_kader" name="id_kader">
                      <?php foreach($dataKader as $kader){
                        if($kader->id == $data->id_kader){
                        ?>
                            <option selected value="<?= $kader->id ?>"><?= $kader->nama ?></option>
                        <?php }else{?>
                            <option value="<?= $kader->id ?>"><?= $kader->nama ?></option>
                        <?php }} ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Simpatisan</button>
            </form>
            </div>
        </div>
        </div>
    </div>
    <?php } ?>

    <?= view('layout/script_bawah') ?>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>