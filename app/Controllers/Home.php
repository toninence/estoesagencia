<?php

namespace App\Controllers;

use App\Models\DeveloperModel;
use App\Models\ProjectManagerModel;
use App\Models\ProjectsModel;

class Home extends BaseController
{
	public function index()
	{
		$db      = \Config\Database::connect();
		$builder = $db->table('projects');
		$builder->select('projects.id, projects.name, 
		projects.description, 
		projectmanager.id as pmId,
		projectManager.img as pmImg,
		CONCAT(projectManager.name, " ", projectManager.surname) as projectManager,
		developer.id as devId,
		developer.img as devImg,
		CONCAT(developer.name, " ", developer.surname) as developer,
		projects.status
		');
		$builder->join('projectManager', 'projects.projectManager = projectManager.id');
		$builder->join('developer', 'projects.assignedTo = developer.id');
		$query = $builder->orderBy('projects.id', 'asc')->get()->getResult();
		$data['projects'] = $query;
		$data['pm'] = (new ProjectManagerModel())->findAll();
		$data['dev'] = (new DeveloperModel())->findAll();

		// print_r($data);
		return view('home', $data);
	}

	//--------------------------------------------------------------------

}
