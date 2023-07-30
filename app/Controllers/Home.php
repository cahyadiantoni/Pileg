<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\DesaModel;
use App\Models\SuaraModel;

class Home extends BaseController
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
            'is_login' => $this->session->has('sesusername'),
            'jumlah_petugas' => $j_petugas->jumlah_petugas,
            'jumlah_desa' => $jumlah_desa,
            'jumlah_tps' => $jumlah_tps,
            'jumlah_tps_dilaporkan' => $j_tps_done->total_jumlah_tps,
            'jumlah_suara' => $j_suara->total_suara,
        );
        
        return view('home', $data);
    }

    public function suara_desa()
    {
        $getdata = $this->desa_model->getData();

        $data = array(
            'page' => 'suara_desa',
            'is_login' => $this->session->has('sesusername'),
            'dataDesa' => $getdata,
        );

        return view('admin/desa', $data);
    }

    public function suara_tps($id)
    {
        $getdatadesa = $this->desa_model->getDataById($id);
        
        foreach($getdatadesa as $datadesa);
        $total_jumlah_suara = $datadesa->total_jumlah_suara;
        $nama_desa = $datadesa->nama_desa;
        $nama_kecamatan = $datadesa->nama_kecamatan;
        $jumlah_tps = $datadesa->jumlah_tps;
        $jumlah_row = ceil($jumlah_tps/5);
        
        for($i = 1; $i<=$jumlah_tps; $i++){
            $where = [
                'id_desa' => $id,
                'tps' => $i
            ];
            $getdatasuara[$i] = $this->suara_model->getData($where);
            foreach($getdatasuara[$i] as $datasuara[$i]);
            // var_dump($datasuara[$i]); die;
            if(empty($datasuara[$i]->jumlah_suara)){
                $jumlah[$i] = 0;
                $id_suara[$i] = 0;
            }else{
                $jumlah[$i] = $datasuara[$i]->jumlah_suara;
                $id_suara[$i] = $datasuara[$i]->id;
            }
            
        }
        $data = array(
            'page' => 'suara_desa',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'level' => $this->session->seslevel,
            'nama_desa' => $nama_desa,
            'nama_kecamatan' => $nama_kecamatan,
            'total_jumlah_suara' => $total_jumlah_suara,
            'jumlah' => $jumlah,
            'id_suara' => $id_suara,
            'jumlah_tps' => $jumlah_tps,
            'jumlah_row' => $jumlah_row
        );

        return view('suara_tps', $data);
    }

    public function laporan_suara($id)
    {
        if($id == 0){
            echo "<script>alert('Laporan Belum Dibuat'); history.back(); </script>";
            die;
        }
        $where = [
            'id' => $id,
        ];
        $getdatasuara = $this->suara_model->getData($where);
        foreach($getdatasuara as $datasuara);
        $tps = $datasuara->tps;
        $jumlah_suara = $datasuara->jumlah_suara;
        $link_foto = $datasuara->link_foto;

        $getdatadesa = $this->desa_model->getDataById($datasuara->id_desa);
        foreach($getdatadesa as $datadesa);
        $nama_desa = $datadesa->nama_desa;
        $nama_kecamatan = $datadesa->nama_kecamatan;
        // var_dump($datadesa->nama_desa);die;

        $where = [
            'id' => $datasuara->id_user,
        ];
        $getdatauser = $this->user_model->getData($where);
        foreach($getdatauser as $datauser);
        $nama = $datauser->nama;

        $data = array(
            'page' => 'suara_desa',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'level' => $this->session->seslevel,
            'tps' => $tps,
            'jumlah_suara' => $jumlah_suara,
            'link_foto' => $link_foto,
            'nama_desa' => $nama_desa,
            'nama_kecamatan' => $nama_kecamatan,
            'nama' => $nama,
        );

        return view('laporan_suara', $data);
    }

    
}
