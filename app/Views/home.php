<?= view('layout/sidebar') ?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
      <p>Sistem Informasi Pemilihian Kepala Daerah</p>
    </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Petugas</h4>
              <p><b><?= $jumlah_petugas ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-home fa-3x"></i>
            <div class="info">
              <h4>Desa</h4>
              <p><b><?= $jumlah_desa ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>TPS</h4>
              <p><b><?= $jumlah_tps_dilaporkan ?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-paper-plane fa-3x"></i>
            <div class="info">
              <h4>TPS Dilaporkan</h4>
              <p><b><?= $jumlah_tps ?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="widget-small primary coloured-icon"><i class="icon fa fa-bullseye fa-3x"></i>
          <div class="info">
            <center>
              <h3>Jumlah Total Suara Tabulasi</h3>
              <h3><b><?= $jumlah_suara ?></b></h3>
            </center>
          </div>
        
        <i class="icon fa fa-bar-chart fa-3x"></i></div>
      </div>
    </main>

<?= view('layout/script_bawah') ?>
