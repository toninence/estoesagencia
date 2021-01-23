<?php namespace App\Models;

use CodeIgniter\Model;

class DeveloperModel extends Model
{
        protected $table      = 'developer';
        protected $primaryKey = 'id';

        protected $returnType = 'object';
        protected $useSoftDeletes = true;

        protected $allowedFields = ['name', 'surname', 'img'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $skipValidation = false;
}