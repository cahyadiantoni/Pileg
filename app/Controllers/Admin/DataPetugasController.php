<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;

class DataPetugasController extends BaseController
{
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $where = [
            'level' => 'Petugas',
        ];

        $getdata = $this->user_model->getData($where);

        $data = array(
            'page' => 'petugas',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'dataPetugas' => $getdata,
            'level' => $this->session->seslevel,
        );

        return view('admin/data_petugas', $data);
    }

    public function tambah()
    {
        $username = $this->request->getPost("username");
        $nama = $this->request->getPost("nama");

        $data = [
            'username' => $username,
            'nama' => $nama,
        ];
        try {
            $simpan = $this->user_model->simpanData($data);
            if ($simpan) {
                echo "<script>alert('Petugas Berhasil Ditambahkan'); window.location='" . base_url('/data_petugas') . "'; </script>";
            } else {
                echo "<script>alert('Petugas Gagal Ditambahkan'); window.location='" . base_url('/data_petugas') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Petugas Gagal Ditambahkan'); window.location'" . base_url('/data_petugas') . "'; </script>";
        }
    }

    public function hapus($id)
    {
        $where = ['id' => $id];
        try {
            $hapus = $this->user_model->hapusData($where);
            if ($hapus) {
                echo "<script>alert('Petugas Berhasil Dihapus'); window.location='" . base_url('/data_petugas') . "'; </script>";
            } else {
                echo "<script>alert('Petugas Gagal Dihapus'); window.location='" . base_url('/data_petugas') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Petugas Gagal Dihapus'); window.location'" . base_url('/data_petugas') . "'; </script>";
        }
    }

    public function edit()
    {
        $id = $this->request->getPost("id");
        $username = $this->request->getPost("username");
        $nama = $this->request->getPost("nama");

        $data = [
            'username' => $username,
            'nama' => $nama,
        ];

        $where = ['id' => $id];
        try {
            $edit = $this->user_model->editData($data, $where);
            if ($edit) {
                echo "<script>alert('Data Petugas Berhasil Diubah'); window.location='" . base_url('/data_petugas') . "'; </script>";
            } else {
                echo "<script>alert('Data Petugas Gagal Diubah'); window.location='" . base_url('/data_petugas') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Data Petugas Gagal Diubah'); window.location'" . base_url('/data_petugas') . "'; </script>";
        }
    }

    function change_password($id)
    {
        $data = [
            'password' => password_hash('12345678', PASSWORD_DEFAULT),
            'is_first' => 1
        ];

        $where = [
            'id' => $id,
        ];

        try {
            $edit = $this->user_model->editPassword($data, $where);
            if ($edit) {
                echo "<script>alert('Password Berhasil Direset'); window.location='" . base_url('/data_petugas') . "'; </script>";
            } else {
                echo "<script>alert('Password Gagal Direset'); window.location='" . base_url('/data_petugas') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Password Gagal Direset'); window.location'" . base_url('/data_petugas') . "'; </script>";
        }
    }
}