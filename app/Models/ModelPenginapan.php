<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenginapan extends Model
{  
    protected $table = "penginapan";
    protected $primaryKey = "id";
    protected $allowedFields    = ['slug_penginapan','nama', 'gambar', 'gambar2', 'gambar3', 'gambar4', 'gambar5', 'deskripsi', 'alamat', 'latitude', 'longitude', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'];
} 