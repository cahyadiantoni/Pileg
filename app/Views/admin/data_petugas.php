<?= view('layout/sidebar') ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Petugas</h1>
          <p>Data Petugas pada Pemilihan Kepala Daerah</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Petugas</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="box-header with-border">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                      + Tambah Petugas
                  </button>
              </div>
              <br>
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th style="width: 100px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach($dataPetugas as $data){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data->username ?></td>
                    <td><?= $data->nama ?></td>
                    <td>
                        <button type="button" data-toggle="modal" data-target="#edit<?= $data->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></button>
                        <a href="<?= base_url('Admin/DataPetugasController/change_password') ?>/<?= $data->id; ?>" class="btn btn-sm btn-warning" onclick="return confirm('Yakin mereset password?')"><i class="fa fa-lock"></i></a>
                        <a href="<?= base_url('Admin/DataPetugasController/hapus') ?>/<?= $data->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Petugas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DataPetugasController/tambah'); ?>" method="post">
                <div class="form-group">
                <label for="exampleInputPassword1">Username</label>
                <input class="form-control" name="username" id="exampleInputPassword1" type="text" placeholder="Masukan Username Petugas">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword2">Nama Lengkap</label>
                <input class="form-control" name="nama" id="exampleInputPassword2" type="text" placeholder="Masukan Nama Lengkap Petugas">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Petugas</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- modal edit -->
    <?php foreach($dataPetugas as $data){ ?>
    <div class="modal fade" id="edit<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Petugas <?= $data->nama ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DataPetugasController/edit'); ?>" method="post">
                <input type="hidden" value="<?= $data->id ?>" name="id">
                <div class="form-group">
                    <label for="exampleInputPassword1">Username</label>
                    <input class="form-control" name="username" id="exampleInputPassword1" type="text" value="<?= $data->username ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Nama Lengkap</label>
                    <input class="form-control" name="nama" id="exampleInputPassword2" type="text" value="<?= $data->nama ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Petugas</button>
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