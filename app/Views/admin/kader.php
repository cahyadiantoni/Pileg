<?= view('layout/sidebar') ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Kader</h1>
          <p>Menampilkan Data Desa pada Pemilihan Kepala Daerah</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Kder</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="box-header with-border">
                <?php if($is_login){ ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                      + Tambah Kader
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
                    <th style="width: 120px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach($dataKader as $data){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?php 
                        if($data->id < 10){
                            echo "KDR00" . $data->id;
                        }else if($data->id < 100){
                            echo "KDR0" . $data->id;
                        }else if($data->id < 1000){
                            echo "KDR" . $data->id;
                        }
                    ?></td>
                    <td><?= $data->nik ?></td>
                    <td><?= $data->nama ?></td>
                    <td><?= $data->hp ?></td>
                    <td><?= $data->desa ?></td>
                    <td><?= $data->kecamatan ?></td>
                    <td>
                      <?php if($is_login){ ?>
                        <button type="button" data-toggle="modal" data-target="#edit<?= $data->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                        <a href="<?= base_url('Admin/DataKaderController/hapus') ?>/<?= $data->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kader</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DataKaderController/tambah'); ?>" method="post">
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
                <input class="form-control" name="desa" id="desa" type="text" placeholder="Masukan Desa">
                </div>
                <div class="form-group">
                <label for="kecamatan">Necamatan</label>
                <input class="form-control" name="kecamatan" id="kecamatan" type="text" placeholder="Masukan Kecamatan">
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
    <?php foreach($dataKader as $data){ ?>
    <div class="modal fade" id="edit<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kader <?= $data->nama ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DataKaderController/edit'); ?>" method="post">
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
                    <input class="form-control" name="desa" id="desa" type="text" value="<?= $data->desa ?>">
                </div>
                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input class="form-control" name="kecamatan" id="kecamatan" type="text" value="<?= $data->kecamatan ?>">
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
    <?php } ?>

    <?= view('layout/script_bawah') ?>
    <!-- Data table plugin-->
    <script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/jquery.dataTables.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>