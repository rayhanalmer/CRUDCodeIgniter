<?php

namespace App\Models;

use CodeIgniter\Model;

class Inventory_DepartemenModel extends Model
{
    protected $table = "inventory_departemen";
    protected $primaryKey = "kode_barang";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_barang', 'nama_barang', 'merk_barang','jumlah_barang','kode_departemen','nilai_perolehan','kondisi_barang','catatan'];

    public function getDepartemen()
    {
        $builder = $this->db->table('departemen');
        $builder->select('*');
        return $builder->get();
    }

    public function getRuang()
    {
        $builder = $this->db->table('ruang');
        $builder->select('*');
        return $builder->get();
    }

    public function getBarangperFak($kode_departemen)
    {
        $where="inventory_departemen.kode_departemen='".$kode_departemen."'";
        $builder = $this->db->table('inventory_departemen');
        $builder->select('*')
        ->join('departemen','departemen.kode_departemen=inventory_departemen.kode_departemen')
        ->where($where);
        echo $kode_departemen;
        
        return $builder->get();
    }

    public function getBarang1($cari)
    {
        $builder = $this->db->table('inventory_departemen');
        $builder->select('*')
        ->join('departemen','departemen.kode_departemen=inventory_departemen.kode_departemen');

        return $builder->get();
    }

    public function saveBarang($data){
        $builder = $this->db->table('inventory_departemen')->insert($data);
        return $builder;
    }

    public function updateBarang($data, $kode_barang)
    {
        $query = $this->db->table('inventory_departemen')->update($data, array('kode_barang' => $kode_barang));
        return $query;
    }

    public function deleteBarang($kode_barang)
    {
        $query = $this->db->table('inventory_departemen')->delete(array('kode_barang' => $kode_barang));
        return $query;
    } 
}