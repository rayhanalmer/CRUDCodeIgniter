<?php

namespace App\Models;

use CodeIgniter\Model;

class DepartemenModel extends Model
{
    protected $table = "departemen";
    protected $primaryKey = "kode_departemen";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_departemen', 'nama_departemen'];

    public function getDepartemen()
    {
        $builder = $this->db->table('departemen');
        $builder->select('*');
        return $builder->get();
    }

    public function getDepartemen1($cari)
    {
        $builder = $this->db->table('departemen');
        $builder->select('*')->like('departemen.nama_departemen',$cari);
        return $builder->get();
    }

    public function saveDepartemen($data){
        $builder = $this->db->table('departemen')->insert($data);
        return $builder;
    }

    public function updateDepartemen($data, $kode_departemen)
    {
        $query = $this->db->table('departemen')->update($data, array('kode_departemen' => $kode_departemen));
        return $query;
    }

    public function deleteDepartemen($kode_departemen)
    {
        $query = $this->db->table('departemen')->delete(array('kode_departemen' => $kode_departemen));
        return $query;
    } 
}