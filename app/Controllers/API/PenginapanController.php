<?php

namespace App\Controllers\API;
use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;

class PenginapanController extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $data = [
            'message' => 'success',
            'data_penginapan' => $this->ModelPenginapan->orderBy('nama', 'asc')->findAll()
        ];
        return $this->respond($data, 200);
    }
}
