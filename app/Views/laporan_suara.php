<?= view('layout/sidebar') ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Laporan Suara</h1>
          <p>Data Laporan Suara</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Laporan Suara</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title" style="text-align: center; ">Kecamatan <?= $nama_kecamatan ?></h3>
            <h3 class="tile-title" style="text-align: center; ">Desa <?= $nama_desa ?></h3>
            <h3 class="tile-title" style="text-align: center; ">TPS <?= $tps ?></h3>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <tbody>
                    <tr style="text-align: center; ">
                        <th>Foto</th>
                        <th colspan="2">Detail</th>
                    </tr>
                    <tr>
                        <td rowspan="5" style="text-align: center; "><img height="500px" src="<?= base_url('upload/images') ?>/<?= $link_foto ?>" alt=""></td>
                        <td height="20px">Nama Petugas : </td>
                        <td height="20px"><?= $nama ?></td>
                    </tr>
                    <tr>
                        <td height="20px">Nama Desa : </td>
                        <td height="20px"><?= $nama_desa ?></td>
                    </tr>
                    <tr>
                        <td height="20px">TPS : </td>
                        <td height="20px">TPS <?= $tps ?></td>
                    </tr>
                    <tr>
                        <td height="20px">Jumlah Suara : </td>
                        <td height="20px"><?= $jumlah_suara ?> Suara</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>


    <?= view('layout/script_bawah') ?>