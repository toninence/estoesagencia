<?php

namespace App\Controllers;

use App\Models\ProjectsModel;

class Projects extends BaseController
{
    private $projectsModel;
    public function __construct()
	{
		$this->projectsModel = new ProjectsModel();
	}
    public function index()
    {
        return;
    }

    public function postProject()
    {
        if($this->request->isAJAX()):
            $request = \config\Services::request(); 
            // return json_encode($request->getPost('description'));
            $data = [
                'name'       => $request->getPost('projectName'),
                'description'       => $request->getPost('description'),
                'projectManager'    => $request->getPost('projectManager'),
                'assignedTo'        => $request->getPost('assignedTo'),
                'status'            => $request->getPost('status'),
            ];
            if($request->getPost('projectId')){
                $data['id'] = $request->getPost('projectId');
            }
            // return json_encode($data);
            if($this->projectsModel->save($data)===false):
                $error = (array) $this->projectsModel->errors();
                $msg=[
                    'ok'    => 'false',
                    'msg'   => 'Ha ocurrido un error',
                    'type'  => 'error',
                    'msgs'  => $error
                ];
                // $msg = json_encode(array_merge($msg, $error));
                return json_encode($msg);
            else:
                $msg = [
                    'ok'    => true,
                    'msg'   => 'Exito al guardar',
                    'type'  => 'success',
                ];
                return json_encode($msg);
            endif;
        else:
            # Ejecuta si la petición NO es a través de AJAX.
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        endif;
    }

    public function deleteProject($id){
        if($this->projectsModel->delete(['id' => $id])):
            $msg = [
                'ok'    => true,
                'msg'   => 'Eliminado con exito',
                'type'  => 'success',
            ];
            return json_encode($msg);
        endif;
        return json_encode($id);
    }

    //--------------------------------------------------------------------

}
