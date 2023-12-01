<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Inventory extends BaseController
{
    protected $inventory;

    function __construct()
    {
        $this->inventory = new InventoryModel();
    }

    public function index()
    {
        $data['inventory'] = $this->inventory->findAll();
        return view('inventory/index', $data);
    }
}