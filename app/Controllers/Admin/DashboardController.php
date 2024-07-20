<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'data_wisata' => $this->ModelWisata->countAllResults(),
            'data_penginapan' => $this->ModelPenginapan->countAllResults(),
            'data_admin' => $this->ModelAdmin->countAllResults(),
        ];
        return view('admin/dashboard/index', $data);
    }
}
