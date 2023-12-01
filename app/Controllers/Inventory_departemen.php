<?php

namespace App\Controllers;

use App\Models\Inventory_DepartemenModel;

class Inventory_departemen extends BaseController
{
    protected $barang;

    function __construct()
    {
        $this->barang = new Inventory_DepartemenModel();
    }

    public function index()
    {
        $data['cari'] = $this->request->getGet('cari');
        $data['barang']=$this->barang->getBarang1($data['cari'])->getResult();
                
        return view('inventory_departemen/index', $data);
    }

    public function find($kode_departemen)
    {
        $data['cari'] = $kode_departemen;
         $data['barang']=$this->barang->getBarangperFak($kode_departemen)->getResult();
        // $data['barang']=$this->barang->getBarang1($data['cari'])->getResult();        
        return view('inventory_departemen/index', $data);
    }

    public function create()
    {
        $data['departemen']=$this->barang->getDepartemen()->getResult();
        return view('inventory_departemen/create', $data);
    }

    public function store()
    {
        if (!$this->validate([
            'kode_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'jumlah_barang' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'kode_departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }

        $data = array(
            'kode_barang'       => $this->request->getPost('kode_barang'),
            'nama_barang'       => $this->request->getPost('nama_barang'),
            'merk_barang'       => $this->request->getPost('merk_barang'),
            'jumlah_barang'     => $this->request->getPost('jumlah_barang'),
            'kode_departemen'     => $this->request->getPost('kode_departemen'),
            'nilai_perolehan'       => $this->request->getPost('nilai_perolehan'),
            'kondisi_barang'       => $this->request->getPost('kondisi_barang'),
            'catatan'       => $this->request->getPost('catatan'),
        );
        $this->barang->saveBarang($data);
        session()->setFlashdata('message', 'Tambah Data Barang Berhasil '.$this->request->getPost('kode_barang')." ".$this->request->getPost('nama_barang')." ".$this->request->getPost('kode_departemen'));
    
        return redirect()->to('/Inventory_departemen');

    }   

    
    function edit($Kode_Barang)
    {
        $dataBarang = $this->barang->find($Kode_Barang);
        if (empty($dataBarang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Barang Tidak ditemukan !');
        }
        $data['barang'] = $dataBarang;
        $data['departemen']=$this->barang->getDepartemen()->getResult();
        return view('inventory_departemen/edit', $data);
    }

    public function update()
    {
        $kode_barang = $this->request->getPost('kode_barang');
        $data = array(
            'kode_barang'       => $this->request->getPost('kode_barang'),
            'nama_barang'       => $this->request->getPost('nama_barang'),
            'merk_barang'       => $this->request->getPost('merk_barang'),
            'jumlah_barang'     => $this->request->getPost('jumlah_barang'),
            'kode_departemen'     => $this->request->getPost('kode_departemen'),
            'nilai_perolehan'       => $this->request->getPost('nilai_perolehan'),
            'kondisi_barang'       => $this->request->getPost('kondisi_barang'),
            'catatan'       => $this->request->getPost('catatan'),
        );
        $this->barang->updateBarang($data, $kode_barang);
        session()->setFlashdata('message', 'Update Data Barang Berhasil '.$this->request->getPost('kode_barang')." ".$this->request->getPost('nama_barang')." ".$this->request->getPost('kode_departemen'));
    
        return redirect()->to('/inventory_departemen');
    }

    function delete($kode_barang)
    {
        // $kode_barang = $this->request->getPost('kode_barang');
        $dataBarang = $this->barang->find($kode_barang);
        if (empty($dataBarang)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Barang Tidak ditemukan !');
        }
        $this->barang->deleteBarang($kode_barang);
        session()->setFlashdata('message', 'Delete Data Barang Berhasil');
        return redirect()->to('/inventory_departemen');
    }


}