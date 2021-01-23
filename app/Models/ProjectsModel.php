<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectsModel extends Model
{
        protected $table      = 'projects';
        protected $primaryKey = 'id';

        protected $returnType = 'object';
        protected $useSoftDeletes = false;

        protected $allowedFields = ['name', 'description', 'projectManager', 'assignedTo', 'status'];

        protected $validationRules = [
            'name' => [
                'rules'  => 'required|alpha_numeric_space|min_length[3]',
                'errors' => [
                    'required' => 'Please write a name for the project',
                ],
            ],
        ];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        protected $skipValidation = false;
}