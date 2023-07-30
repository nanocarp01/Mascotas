<?php

namespace App\Models;

use CodeIgniter\Model;

class estadoModel extends Model
{
    protected $table = 'estado';
    protected $primaryKey = 'idEstado';
    protected $allowedFields = ['estado'];
}