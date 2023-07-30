<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DesaModel;
use App\Models\SuaraModel;
use App\Models\KaderModel;
use App\Models\SimpatisanModel;


class DataKaderController extends BaseController
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
        $getdata = $this->kader_model->getData();

        $data = array(
            'page' => 'kader',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'dataKader' => $getdata,
            'level' => $this->session->seslevel,
        );

        return view('admin/kader', $data);
    }

    public function tambah()
    {
        $nik = $this->request->getPost("nik");
        $nama = $this->request->getPost("nama");
        $hp = $this->request->getPost("hp");
        $desa = $this->request->getPost("desa");
        $kecamatan = $this->request->getPost("kecamatan");

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'hp' => $hp,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
        ];
        try {
            $simpan = $this->kader_model->simpanData($data);
            if ($simpan) {
                echo "<script>alert('Kader Berhasil Ditambahkan'); window.location='" . base_url('/data_kader') . "'; </script>";
            } else {
                echo "<script>alert('Kader Gagal Ditambahkan'); window.location='" . base_url('/data_kader') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Kader Gagal Ditambahkan'); window.location'" . base_url('/data_kader') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->kader_model->hapusData($where);
            if ($hapus) {
                echo "<script>alert('Kader Berhasil Dihapus'); window.location='" . base_url('/data_kader') . "'; </script>";
            } else {
                echo "<script>alert('Kader Gagal Dihapus'); window.location='" . base_url('/data_kader') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Kader Gagal Dihapus'); window.location'" . base_url('/data_kader') . "'; </script>";
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

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'hp' => $hp,
            'desa' => $desa,
            'kecamatan' => $kecamatan,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->kader_model->editData($data, $where);
            if ($edit) {
                echo "<script>alert('Kader Berhasil Diubah'); window.location='" . base_url('/data_kader') . "'; </script>";
            } else {
                echo "<script>alert('Kader Gagal Diubah'); window.location='" . base_url('/data_kader') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Kader Gagal Diubah'); window.location'" . base_url('/data_kader') . "'; </script>";
        }
    }
}