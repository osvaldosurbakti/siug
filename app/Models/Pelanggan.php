<?php

namespace App\Models;

use CodeIgniter\Model;

class Pelanggan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pelanggan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "user_id",
        "nik",
        "alamat",
        "foto_ktp"
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function AllData()
    {
        return $this->db->table('pelanggan')
            ->select('pelanggan.id, pelanggan.user_id, pelanggan.nik, pelanggan.alamat, pelanggan.foto_ktp, users.name, users.email, users.phone_no, users.role')
            ->join('users', 'users.id=pelanggan.user_id', 'left')
            ->where('pelanggan.deleted_at', null)
            ->get()
            ->getResultArray();
    }

    public function DetailData($id_pelanggan)
    {
        return $this->db->table('pelanggan')
            ->select('pelanggan.id, pelanggan.user_id, pelanggan.nik, pelanggan.alamat, pelanggan.foto_ktp, users.name, users.email, users.phone_no, users.role')
            ->join('users', 'users.id=pelanggan.user_id', 'left')
            ->where('pelanggan.id', $id_pelanggan)
            ->get()
            ->getRowArray();
    }
}
