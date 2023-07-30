<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DesaModel;
use App\Models\SuaraModel;

class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->desa_model = new DesaModel();
        $this->suara_model = new SuaraModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $jumlah_petugas = $this->user_model->countPetugas();
        $jumlah_desa = $this->desa_model->countDesa();
        $jumlah_tps = $this->suara_model->countTPS();
        $jumlah_tps_dilaporkan = $this->desa_model->countTPS();
        $jumlah_suara = $this->suara_model->countSuara();
        foreach($jumlah_suara as $j_suara);
        foreach($jumlah_tps_dilaporkan as $j_tps_done);
        foreach($jumlah_petugas as $j_petugas);
        $data = array(
            'page' => 'dashboard',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'level' => $this->session->seslevel,
            'jumlah_petugas' => $j_petugas->jumlah_petugas,
            'jumlah_desa' => $jumlah_desa,
            'jumlah_tps' => $jumlah_tps,
            'jumlah_tps_dilaporkan' => $j_tps_done->total_jumlah_tps,
            'jumlah_suara' => $j_suara->total_suara,
        );

        return view('admin/dashboard', $data);
    }
}
