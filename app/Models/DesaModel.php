<?php

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{
    function getData(){
        $builder = $this->db->query('
        SELECT d.*, SUM(s.jumlah_suara) AS total_jumlah_suara FROM desa AS d LEFT JOIN suara AS s ON d.id = s.id_desa GROUP BY d.id, d.nama_desa;
        ');

        return $builder->getResult();
    }
    function getDataById($id){
        $builder = $this->db->query('
        SELECT d.*, SUM(s.jumlah_suara) AS total_jumlah_suara FROM desa AS d LEFT JOIN suara AS s ON d.id = s.id_desa where d.id='.$id.' GROUP BY d.id, d.nama_desa;
        ');

        return $builder->getResult();
    }
    
    function countDesa(){
        $builder = $this->db->table('desa');
        $query = $builder->countAll();

        return $query;
    }

    function countTPS(){
        $builder = $this->db->query('
        SELECT SUM(jumlah_tps) AS total_jumlah_tps FROM desa;
        ');

        return $builder->getResult();
    }

    public function simpanData($data)
    {
        $this->db->table('desa')->insert($data);

        return true;
    }

    public function hapusData($where)
    {
        $this->db->table('desa')->delete($where);

        return true;
    }

    public function editData($data, $where)
    {
        $this->db->table('desa')->update($data, $where);

        return true;
    }

}