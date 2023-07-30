<?= view('layout/sidebar') ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Data Desa</h1>
          <p>Menampilkan Data Desa pada Pemilihan Kepala Daerah</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Data Desa</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
            <div class="tile">
              <div class="box-header with-border">
                <?php if($is_login){ ?>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
                      + Tambah Desa
                  </button>
                <?php } ?>
              </div>
              <br>
            <div class="tile-body">
              <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Desa</th>
                    <th>Kecamatan</th>
                    <th>Jumlah TPS</th>
                    <th>Total Suara</th>
                    <th style="width: 120px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no = 0;
                    foreach($dataDesa as $data){
                    $no++;
                    ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $data->nama_desa ?></td>
                    <td><?= $data->nama_kecamatan ?></td>
                    <td><?= $data->jumlah_tps ?></td>
                    <td><?= $data->total_jumlah_suara ?></td>
                    <td>
                      <?php if($is_login){ ?>
                        <a href="<?= base_url('suara_tps') ?>/<?= $data->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                        <button type="button" data-toggle="modal" data-target="#edit<?= $data->id; ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
                        <a href="<?= base_url('Admin/DesaController/hapus') ?>/<?= $data->id; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin menghapus data?')"><i class="fa fa-trash"></i></a>
                      <?php }else{ ?>
                        <a href="<?= base_url('suara_tps') ?>/<?= $data->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                      <?php } ?>

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
            <h5 class="modal-title" id="exampleModalLabel">Tambah Desa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DesaController/tambah'); ?>" method="post">
                <div class="form-group">
                <label for="exampleInputPassword1">Nama Desa</label>
                <input class="form-control" name="nama_desa" id="exampleInputPassword1" type="text" placeholder="Masukan Nama Desa">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword2">Nama Kecamatan</label>
                <input class="form-control" name="nama_kecamatan" id="exampleInputPassword2" type="text" placeholder="Masukan Nama Kecamatan">
                </div>
                <div class="form-group">
                <label for="exampleInputPassword3">Jumlah TPS</label>
                <input class="form-control" name="jumlah_tps" id="exampleInputPassword3" type="number">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Desa</button>
            </form>
            </div>
        </div>
        </div>
    </div>

    <!-- modal edit -->
    <?php foreach($dataDesa as $data){ ?>
    <div class="modal fade" id="edit<?= $data->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Desa <?= $data->nama_desa ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form action="<?php echo base_url('Admin/DesaController/edit'); ?>" method="post">
                <input type="hidden" value="<?= $data->id ?>" name="id">
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Desa</label>
                    <input class="form-control" name="nama_desa" id="exampleInputPassword1" type="text" value="<?= $data->nama_desa ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword2">Nama Kecamatan</label>
                    <input class="form-control" name="nama_kecamatan" id="exampleInputPassword2" type="text" value="<?= $data->nama_kecamatan ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword3">Jumlah TPS</label>
                    <input class="form-control" name="jumlah_tps" id="exampleInputPassword3" type="number" value="<?= $data->jumlah_tps ?>">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save Desa</button>
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