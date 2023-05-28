<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "name",
        "email",
        "phone_no",
        "password",
        "role",
        "updated_by"
    ];

    // Dates
    protected $useTimestamps = true;
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
    protected $beforeInsert   = ["beforeInsert"];
    protected $afterInsert    = ['insertUserstamp'];
    protected $beforeUpdate   = ["beforeUpdate",'updateUserstamp'];
    protected $afterUpdate    = ['afterUpdate'];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    protected function insertUserstamp(array $data) {
        $user_id = session()->get('id');
        //if (!empty($user_id) &&  !array_key_exists('created_by', $data) && !array_key_exists('updated_by', $data)) {
        if (!empty($user_id) &&   !array_key_exists('updated_by', $data)) {
            //$data['data']['created_by'] = $user_id;
            $data['data']['updated_by'] = $user_id;
        }
        return $data;
    }

    /**
     * This method saves the session "user_id" value to "updated_by" array element before 
     * the row is inserted into the database.
     *
     */
    protected function updateUserstamp(array $data) {
        $user_id = session()->get('id');
        if (!empty($user_id) && !array_key_exists('updated_by', $data)) {
            $data['data']['updated_by'] = $user_id;
        }
        return $data;
    }
    
    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function afterUpdate(array $data)
    {
        $data = session()->get('name');
        return $data;
    }

    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }

}
