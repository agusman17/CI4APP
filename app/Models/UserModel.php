<?php

namespace App\Models;

//use App\Models\Query\BaseModel;
use CodeIgniter\Model;

class UserModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'password', 'no_handphone', 'address'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'name'      => 'required',
        'email'     => 'required|valid_email|is_unique[users.email]',
        'password'  => 'required',
    ];
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

    public function search($keyword, $dataPerPage)
    {
        if ($keyword == '') {
            return $this->table($this->table)
                ->orderBy('id', 'asc')
                ->paginate($dataPerPage, 'user');
        } else {
            return $this->table($this->table)
                ->select('*')
                ->orLike('name', $keyword)
                ->orLike('email', $keyword)
                ->orderBy('id', 'asc')
                ->paginate($dataPerPage, 'user');
        }
    }
}
