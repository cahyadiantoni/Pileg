<?= view('layout/sidebar') ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-edit"></i> Input Suara</h1>
      <p>Sistem Informasi Pemilihian Kepala Daerah</p>
    </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Input Suara</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Form Input Suara</h3>
            <div class="tile-body">
              <?= form_open_multipart('input_suara/upload') ?>
                <div class="form-group">
                  <label class="control-label">Nama Desa</label>
                  <select class="form-control" id="demoSelect" name="id_desa">
                    <option disabled>Pilih Desa</option>
                      <?php foreach($dataDesa as $data){ ?>
                      <option value="<?= $data->id ?>"><?= $data->nama_desa ?></option>
                      <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label class="control-label">TPS</label>
                  <input class="form-control" type="number" placeholder="Masukan Nomor TPS" name="tps">
                </div>
                <div class="form-group">
                  <label class="control-label">Jumlah Suara</label>
                  <input class="form-control" type="number" placeholder="Masukan Jumlah Suara" name="jumlah_suara">
                </div>
                <div class="form-group">
                  <label class="control-label">Upload Foto</label>
                  <input class="form-control" type="file" name="userfile">
                </div>
              </div>
              <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Input Suara</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </main>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ganti Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url('Login/change_password'); ?>" method="post">
            <div class="form-group">
              <label for="exampleInputPassword1">Password Baru</label>
              <input class="form-control" name="newPassword" id="exampleInputPassword1" type="text" aria-describedby="passwordHelp" placeholder="Enter password"><small class="form-text text-muted" id="emailHelp">Buatlah Password baru untuk akunmu.</small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>


<?= view('layout/script_bawah') ?>
<script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/bootstrap-datepicker.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/select2.min.js') ?>"></script>
<script type="text/javascript" src="<?= base_url('vali_master/docs/js/plugins/bootstrap-datepicker.min.js') ?>"></script>
<script type="text/javascript">
  $('#demoSelect').select2();
</script>
<?php  
if($is_first=='1'){
?>
  <script>
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
  </script>
<?php } ?>