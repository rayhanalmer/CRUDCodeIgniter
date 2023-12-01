<?php

namespace App\Controllers;

use App\Models\DepartemenModel;

class Departemen extends BaseController
{
    protected $departemen;

    function __construct()
    {
        $this->departemen = new DepartemenModel();
    }

    public function index()
    {
        
        // $data['departemen'] = $this->departemen->getDepartemen()->getResult();
        $data['cari'] = $this->request->getGet('cari');
        $data['departemen']=$this->departemen->getDepartemen1($data['cari'])->getResult();

        return view('departemen/index', $data);
    }


    public function create()
    {
        return view('departemen/create');
    }

    public function store()
    {
        if (!$this->validate([
            'kode_departemen' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus diisi'
                ]
            ],
            'nama_departemen' => [
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
            'kode_departemen'        => $this->request->getPost('kode_departemen'),
            'nama_departemen'       => $this->request->getPost('nama_departemen'),
        );
        $this->departemen->saveDepartemen($data);
        session()->setFlashdata('message', 'Tambah Data Departemen Berhasil '.$this->request->getPost('kode_departemen')." ".$this->request->getPost('nama_departemen'));
    
        return redirect()->to('/departemen?cari=');

    }   

    
    function edit($Kode_Departemen)
    {
        $dataDepartemen = $this->departemen->find($Kode_Departemen);
        if (empty($dataDepartemen)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Departemen Tidak ditemukan !');
        }
        $data['departemen'] = $dataDepartemen;

        return view('departemen/edit', $data);
    }

    public function update()
    {
        $kode_departemen = $this->request->getPost('kode_departemen');
        $data = array(
            'kode_departemen'        => $this->request->getPost('kode_departemen'),
            'nama_departemen'       => $this->request->getPost('nama_departemen'),
        );
        $this->departemen->updateDepartemen($data, $kode_departemen);
        session()->setFlashdata('message', 'Update Data Departemen Berhasil '.$this->request->getPost('kode_departemen')." ".$this->request->getPost('nama_departemen'));
    
        return redirect()->to('/departemen?cari=');
    }

    function delete($kode_departemen)
    {
        // $kode_departemen = $this->request->getPost('kode_departemen');
        $dataDepartemen = $this->departemen->find($kode_departemen);
        if (empty($dataDepartemen)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Departemen Tidak ditemukan !');
        }
        $this->departemen->deleteDepartemen($kode_departemen);
        session()->setFlashdata('message', 'Delete Data Departemen Berhasil');
        return redirect()->to('/departemen?cari=');
    }

}