<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    function getData($where){
        $builder = $this->db->table('user');
        $builder->where($where);

        return $builder->get()->getResult();
    }

    function countPetugas(){
        $builder = $this->db->query("
        SELECT COUNT( * ) as 'jumlah_petugas'
        FROM user
        WHERE level='Petugas';
        ");

        return $builder->getResult();
    }

    function editPassword($data, $where){
        $this->db->table('user')->update($data, $where);

        return true;
    }

    public function simpanData($data)
    {
        $this->db->table('user')->insert($data);

        return true;
    }

    public function hapusData($where)
    {
        $this->db->table('user')->delete($where);

        return true;
    }

    public function editData($data, $where)
    {
        $this->db->table('user')->update($data, $where);

        return true;
    }

}