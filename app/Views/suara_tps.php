<?= view('layout/sidebar') ?>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Suara PerTPS</h1>
          <p>Data Perolehan Suara Per TPS</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Suara PerTPS</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile" style="text-align: center; ">
            <h3 class="tile-title">Kecamatan <?= $nama_kecamatan ?></h3>
            <h3 class="tile-title">Desa <?= $nama_desa ?> (<?= $jumlah_tps ?> TPS)</h3>
            <div class="table-responsive">
              <table class="table table-striped table-bordered">
                <tbody>
                    <?php $x=1; $y=1; $z=5;
                    for($i=1; $i<=$jumlah_row; $i++){ ?>

                    <tr>
                        <?php for($x; $x<=$z; $x++){  
                            if($x<=$jumlah_tps){ ?>
                            <th>TPS <?= $x ?></th>
                        <?php }else{ ?>
                            <th></th> 
                        <?php }} ?>
                    </tr>
                    <tr>
                        <?php for($y; $y<=$z; $y++){  
                            if($y<=$jumlah_tps){ ?>
                            <td><h5><a href="<?= base_url('laporan_suara') ?>/<?= $id_suara[$y] ?>"><?= $jumlah[$y] ?></a></h5></td>
                        <?php }else{ ?>
                            <td></td> 
                        <?php }} ?>
                    </tr>
                    <?php
                    $z+=5;
                    } 
                ?>
                    <tr>
                        <td colspan="3"><h5>Total Suara</h5></td>
                        <td colspan="2"><h5><?= $total_jumlah_suara ?></h5></td>
                    </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </main>


    <?= view('layout/script_bawah') ?>