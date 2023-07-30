<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DesaModel;
use App\Models\SuaraModel;


class DesaController extends BaseController
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
        $getdata = $this->desa_model->getData();

        $data = array(
            'page' => 'desa',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'dataDesa' => $getdata,
            'level' => $this->session->seslevel,
        );

        return view('admin/desa', $data);
    }

    public function tambah()
    {
        $nama_desa = $this->request->getPost("nama_desa");
        $nama_kecamatan = $this->request->getPost("nama_kecamatan");
        $jumlah_tps = $this->request->getPost("jumlah_tps");

        $data = [
            'nama_desa' => $nama_desa,
            'nama_kecamatan' => $nama_kecamatan,
            'jumlah_tps' => $jumlah_tps,
        ];
        try {
            $simpan = $this->desa_model->simpanData($data);
            if ($simpan) {
                echo "<script>alert('Desa Berhasil Ditambahkan'); window.location='" . base_url('/desa') . "'; </script>";
            } else {
                echo "<script>alert('Desa Gagal Ditambahkan'); window.location='" . base_url('/desa') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Desa Gagal Ditambahkan'); window.location'" . base_url('/desa') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->desa_model->hapusData($where);
            if ($hapus) {
                echo "<script>alert('Desa Berhasil Dihapus'); window.location='" . base_url('/desa') . "'; </script>";
            } else {
                echo "<script>alert('Desa Gagal Dihapus'); window.location='" . base_url('/desa') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Desa Gagal Dihapus'); window.location'" . base_url('/desa') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $nama_desa = $this->request->getPost("nama_desa");
        $nama_kecamatan = $this->request->getPost("nama_kecamatan");
        $jumlah_tps = $this->request->getPost("jumlah_tps");

        $data = [
            'nama_desa' => $nama_desa,
            'nama_kecamatan' => $nama_kecamatan,
            'jumlah_tps' => $jumlah_tps,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->desa_model->editData($data, $where);
            if ($edit) {
                echo "<script>alert('Desa Berhasil Diubah'); window.location='" . base_url('/desa') . "'; </script>";
            } else {
                echo "<script>alert('Desa Gagal Diubah'); window.location='" . base_url('/desa') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Desa Gagal Diubah'); window.location'" . base_url('/desa') . "'; </script>";
        }
    }
}