<?php

namespace App\Controllers\API;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class WisataController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_wisata' => $this->ModelWisata->orderBy('nama', 'asc')->findAll()
        ];
        return $this->respond($data, 200);
    }
}
