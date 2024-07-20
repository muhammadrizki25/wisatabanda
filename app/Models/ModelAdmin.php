<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'username', 'email', 'hashed_password', 'verification_token', 'is_verified'];
}
