<?php

namespace App\Models;

use CodeIgniter\Model;

class InventoryModel extends Model
{
    protected $table = "inventory";
    protected $primaryKey = "kode_barang";
    protected $returnType = "object";
    protected $useTimestamps = true;
    protected $allowedFields = ['kode_barang', 'nama_barang', 'merk_barang', 'jumlah_barang'];
}