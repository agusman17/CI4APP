<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\RoleModel;

class RoleController extends BaseController
{

    /**
     * Properties controller
     */
    protected $roleModel;

    /**
     * Construct Function
     */
    public function __construct()
    {
        $this->roleModel = new RoleModel();
    }

    /**
     * View Function
     */
    public function index()
    {
        $roles = $this->roleModel->findAll();

        $data = [
            'roles' => $roles,
        ];

        return view("role/index", $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('role/create', $data);
    }

    public function edit($id)
    {
        $data = [
            'role' => $this->roleModel->find($id),
            'validation' => \Config\Services::validation(),
        ];

        return view('role/edit', $data);
    }

    /**
     * Action Function
     */
    public function save()
    {
        try {

            if (!$this->validate($this->roleModel->getValidationRules())) {
                return redirect()->to('/role/create')->withInput();
            }

            $result = $this->roleModel->save([
                'name' => $this->request->getVar('name'),
            ]);

            if ($result) {
                session()->setFlashdata("save", "Roles data has been saved !");
                return redirect()->to('/role')->withInput();
            }
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }

    public function update($id)
    {
        try {
            if (!$this->validate($this->roleModel->getValidationRules())) {
                return redirect()->to('/role/create')->withInput();
            }

            $result = $this->roleModel->save([
                'id'   => $id,
                'name' => $this->request->getVar('name'),
            ]);

            if ($result) {
                session()->setFlashdata("update", "Roles data has been updated !");
                return redirect()->to('/role')->withInput();
            }
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->roleModel->delete($id);
            session()->setFlashdata("delete", "Role data has been deleted !");
            return redirect()->to('/role');
        } catch (\Exception $error) {
            "Catch Error : " . $error->getMessage();
        }
    }
}
