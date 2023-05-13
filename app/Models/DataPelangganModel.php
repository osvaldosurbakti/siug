<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPelangganModel extends Model
{
    protected $table      = 'siug';
    protected $primaryKey = 'nomor_handphone';
    protected $useTimestamps = true;
}
