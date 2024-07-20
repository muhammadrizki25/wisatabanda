<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWisata extends Model
{  
    protected $table = "wisata";
    protected $primaryKey = "id";
    protected $allowedFields    = ['slug_wisata','nama', 'gambar', 'gambar2', 'gambar3', 'gambar4', 'gambar5', 'deskripsi', 'alamat', 'latitude', 'longitude', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'];
} 