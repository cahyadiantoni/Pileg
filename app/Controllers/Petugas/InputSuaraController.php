<?php

namespace App\Controllers\Petugas;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\DesaModel;
use App\Models\SuaraModel;
use CodeIgniter\Files\File;

class InputSuaraController extends BaseController
{

    protected $helpers = ['form'];

    public function __construct()
    {
        $this->user_model = new UserModel();
        $this->suara_model = new SuaraModel();
        $this->desa_model = new DesaModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $where = [
            'username' => $this->session->sesusername,
        ];

        $getdatadesa = $this->desa_model->getData();
        $getUser = $this->user_model->getData($where);

        foreach($getUser as $data);

        $data = array(
            'page' => 'suara',
            'nama_user' => $this->session->sesnama,
            'is_login' => $this->session->has('sesusername'),
            'is_first' => $data->is_first,
            'dataDesa' => $getdatadesa,
            'level' => $this->session->seslevel,
        );

        return view('petugas/input_suara', $data);
    }

    public function upload()
    {
        $validationRule = [
            'userfile' => [
                'label' => 'Image File',
                'rules' => [
                    'uploaded[userfile]',
                    'is_image[userfile]',
                    'mime_in[userfile,image/jpg,image/jpeg,image/gif,image/png,image/webp]',
                ],
            ],
        ];
        if (! $this->validate($validationRule)) {
            $data = ['errors' => $this->validator->getErrors()];

            var_dump($data); die;

            return view('petugas/input_suara', $data);
        }

        $img = $this->request->getFile('userfile');
        $id_desa = $this->request->getPost('id_desa');
        $tps = $this->request->getPost('tps');
        $jumlah_suara = $this->request->getPost('jumlah_suara');

        if (! $img->hasMoved()) {
            $img->move(WRITEPATH . '../public/upload/images/');
            $data = array(
                'id_desa' => $id_desa,
                'id_user' => $this->session->sesid,
                'tps' => $tps,
                'jumlah_suara' => $jumlah_suara,
                'link_foto' => $img->getName()
            );

            $where = [
                'id_desa' => $id_desa,
                'tps' => $tps,
            ];
    
            $getData = $this->suara_model->getData($where);

            if(empty($getData)){
                try {
                    $simpan = $this->suara_model->simpanData($data);
                    if ($simpan) {
                        echo "<script>alert('Data Suara Berhasil Ditambahkan'); window.location='" . base_url('/input_suara') . "'; </script>";
                    } else {
                        echo "<script>alert('Data Suara Gagal Ditambahkan'); window.location='" . base_url('/input_suara') . "'; </script>";
                    }
                } catch (\Exception $e) {
                    echo "<script>alert('Data Suara Gagal Ditambahkan'); window.location'" . base_url('/input_suara') . "'; </script>";
                }
            } else {
                try {
                    $edit = $this->suara_model->editData($data, $where);
                    if ($edit) {
                        echo "<script>alert('Data Suara Berhasil Diubah'); window.location='" . base_url('/input_suara') . "'; </script>";
                    } else {
                        echo "<script>alert('Data Suara Gagal Diubah'); window.location='" . base_url('/input_suara') . "'; </script>";
                    }
                } catch (\Exception $e) {
                    echo "<script>alert('Data Suara Gagal Diubah'); window.location'" . base_url('/input_suara') . "'; </script>";
                }
            }
        }
    }
}
