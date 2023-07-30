<?php 

namespace App\Models;

use CodeIgniter\Model;

class KaderModel extends Model
{
    function getData($where){
        $builder = $this->db->table('kader');
        $builder->where($where);

        return $builder->get()->getResult();
    }

    public function simpanData($data)
    {
        $this->db->table('kader')->insert($data);

        return true;
    }

    public function hapusData($where)
    {
        $this->db->table('kader')->delete($where);

        return true;
    }

    public function editData($data, $where)
    {
        $this->db->table('kader')->update($data, $where);

        return true;
    }
}

