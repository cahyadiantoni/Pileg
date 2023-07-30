<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DesaModel;
use App\Models\SuaraModel;
use App\Models\KaderModel;
use App\Models\SimpatisanModel;


class DataSimpatisanController extends BaseController
{
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->desa_model = new DesaModel();
        $this->suara_model = new SuaraModel();
        $this->kader_model = new KaderModel();
        $this->simpatisan_model = new SimpatisanModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $getdata = $this->simpatisan_model->getData();
        $getdataKader = $this->kader_model->getData();

        $data = array(
            'page' => 'simpatisan',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'dataSimpatisan' => $getdata,
            'dataKader' => $getdataKader,
            'level' => $this->session->seslevel,
        );

        return view('admin/simpatisan', $data);
    }

    public function tambah()
    {
        $nik = $this->request->getPost("nik");
        $nama = $this->request->getPost("nama");
        $hp = $this->request->getPost("hp");
        $desa = $this->request->getPost("desa");
        $kecamatan = $this->request->getPost("kecamatan");
        $id_kader = $this->request->getPost("id_kader");

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'hp' => $hp,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'id_kader' => $id_kader,
        ];
        try {
            $simpan = $this->simpatisan_model->simpanData($data);
            if ($simpan) {
                echo "<script>alert('Simpatisan Berhasil Ditambahkan'); window.location='" . base_url('/data_simpatisan') . "'; </script>";
            } else {
                echo "<script>alert('Simpatisan Gagal Ditambahkan'); window.location='" . base_url('/data_simpatisan') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Simpatisan Gagal Ditambahkan'); window.location'" . base_url('/data_simpatisan') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->simpatisan_model->hapusData($where);
            if ($hapus) {
                echo "<script>alert('Simpatisan Berhasil Dihapus'); window.location='" . base_url('/data_simpatisan') . "'; </script>";
            } else {
                echo "<script>alert('Simpatisan Gagal Dihapus'); window.location='" . base_url('/data_simpatisan') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Simpatisan Gagal Dihapus'); window.location'" . base_url('/data_simpatisan') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $nik = $this->request->getPost("nik");
        $nama = $this->request->getPost("nama");
        $hp = $this->request->getPost("hp");
        $desa = $this->request->getPost("desa");
        $kecamatan = $this->request->getPost("kecamatan");
        $id_kader = $this->request->getPost("id_kader");

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'hp' => $hp,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
            'id_kader' => $id_kader,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->simpatisan_model->editData($data, $where);
            if ($edit) {
                echo "<script>alert('Simpatisan Berhasil Diubah'); window.location='" . base_url('/data_simpatisan') . "'; </script>";
            } else {
                echo "<script>alert('Simpatisan Gagal Diubah'); window.location='" . base_url('/data_simpatisan') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Simpatisan Gagal Diubah'); window.location'" . base_url('/data_simpatisan') . "'; </script>";
        }
    }
}