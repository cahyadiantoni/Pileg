<?php

namespace App\Models;

use CodeIgniter\Model;

class SuaraModel extends Model
{
    function getData($where){
        $builder = $this->db->table('suara');
        $builder->where($where);

        return $builder->get()->getResult();
    }

    function countTPS(){
        $builder = $this->db->table('suara');
        $query = $builder->countAll();

        return $query;
    }

    function countSuara(){
        $builder = $this->db->query('SELECT sum(jumlah_suara) AS total_suara from suara');

        return $builder->getResult();
    }
    
    public function simpanData($data)
    {
        $this->db->table('suara')->insert($data);
        
        return true;
    }
    
    public function editData($data, $where)
    {
        $this->db->table('suara')->update($data, $where);
        
        return true;
    }
    
}