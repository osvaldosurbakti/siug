<?php

namespace App\Models;

use CodeIgniter\Model;

class DataPelangganModel extends Model
{
    protected $table      = 'data_pelanggan';
    protected $useTimestamps = true;

    public function getDataPelanggan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
}
