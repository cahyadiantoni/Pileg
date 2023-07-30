<?php 

namespace App\Models;

use CodeIgniter\Model;

class SimpatisanModel extends Model
{
    function getData($where){
        $builder = $this->db->table('simpatisan');
        $builder->where($where);

        return $builder->get()->getResult();
    }

    public function simpanData($data)
    {
        $this->db->table('simpatisan')->insert($data);

        return true;
    }

    public function hapusData($where)
    {
        $this->db->table('simpatisan')->delete($where);

        return true;
    }

    public function editData($data, $where)
    {
        $this->db->table('simpatisan')->update($data, $where);

        return true;
    }
}

