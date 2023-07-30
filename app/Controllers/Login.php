<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Login extends Controller
{
    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        return view('login');
    }

    public function proses_login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $where = [
            'username' => $username,
        ];

        $getUser = $this->user_model->getData($where);

        foreach($getUser as $data);

        if(password_verify($password, $data->password)){
            $dataSession = [
                'sesusername' => $data->username,
                'sesnama' => $data->nama,
                'seslevel' => $data->level,
                'sesid' => $data->id,
            ];
            $this->session->set($dataSession);
            if($data->level=="Administrator"){
                return redirect()->to('/admin');
            }else{
                return redirect()->to('/input_suara');
            }
        }else{
            echo "<script>alert('Username atau Password salah!'); window.location='" . base_url('login') . "'; </script>";
        }
    }
    
    function logout()
    {
        $this->session->destroy();
        return redirect()->to('/');
    }

    function change_password()
    {
        $password = $this->request->getPost('newPassword');
        $username = $this->session->sesusername;

        $data = [
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'is_first' => 0
        ];

        $where = [
            'username' => $username,
        ];

        try {
            $edit = $this->user_model->editPassword($data, $where);
            if ($edit) {
                echo "<script>alert('Password Berhasil Diubah'); window.location='" . base_url('/admin') . "'; </script>";
            } else {
                echo "<script>alert('Password Gagal Diubah'); window.location='" . base_url('/admin') . "'; </script>";
            }
        } catch (\Exception $e) {
            echo "<script>alert('Password Gagal Diubah'); window.location'" . base_url('/admin') . "'; </script>";
        }
    }

}