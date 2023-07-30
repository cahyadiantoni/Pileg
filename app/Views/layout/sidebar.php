<?= view('layout/header'); ?>
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
    <?php if($is_login){ ?>
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" height="42" src="<?= base_url('vali_master/docs/images/profile.png') ?>" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $nama_user ?></p>
          <!-- <p class="app-sidebar__user-designation">Frontend Developer</p> -->
        </div>
      </div>
    <?php } ?>
      <ul class="app-menu disabled">
        <?php if($is_login){ ?>
          <hr>
          <li>
            <p>
              <span class="app-sidebar__user-name">
                Halo, <?= $nama_user ?>
              </span>
            </p>
            </li>
          <?php if($level == "Administrator"){ ?>
            <?php if($page == "dashboard"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('admin') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('admin') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <?php } ?>
            <?php if($page == "desa"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('desa') ?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Desa</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('desa') ?>"><i class="app-menu__icon fa fa-pie-chart"></i><span class="app-menu__label">Desa</span></a></li>
            <?php } ?>
            <?php if($page == "petugas"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('data_petugas') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Petugas</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('data_petugas') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Petugas</span></a></li>
            <?php } ?>
            <?php if($page == "kader"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('data_kader') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Kader</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('data_kader') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Kader</span></a></li>
            <?php } ?>
            <?php if($page == "simpatisan"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('data_simpatisan') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Simpatisan</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('data_simpatisan') ?>"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Simpatisan</span></a></li>
            <?php } ?>
          <?php }else{ ?>
              <li><a class="app-menu__item active" href="<?= base_url('input_suara') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Input Suara</span></a></li>
          <?php } ?>
        <?php }else{ ?>
            <?php if($page == "dashboard"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('home') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('home') ?>"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>
            <?php } ?>
            <?php if($page == "suara_desa"){ ?>
              <li><a class="app-menu__item active" href="<?= base_url('suara_desa') ?>"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Suara</span></a></li>
            <?php }else{ ?>
              <li><a class="app-menu__item" href="<?= base_url('suara_desa') ?>"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Data Suara</span></a></li>
            <?php } ?>
        <?php } ?>
      </ul>
    </aside>