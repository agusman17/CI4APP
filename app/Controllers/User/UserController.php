<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RoleUserModel;

class UserController extends BaseController
{

    protected $userModel, $roleModel, $roleUserModel;
    protected $dataPerPage = 7;

    public function __construct()
    {
        $this->userModel        = new UserModel();
        $this->roleModel        = new RoleModel();
        $this->roleUserModel    = new RoleUserModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;
        $users = $this->userModel->search($this->request->getVar('keyword'), $this->dataPerPage);

        $data = [
            'users'         => $users,
            'pager'         => $this->userModel->pager,
            'currentPage'   => $currentPage,
            'dataPerPage'   => $this->dataPerPage,
            'totalData'     => $this->userModel->pager->getTotal('user'),
            'totalPage'     => $this->userModel->pager->getPageCount('user'),
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'roles'      => $this->roleModel->findAll(),
        ];

        return view('user/create', $data);
    }

    public function edit($id)
    {
        $roleUsers = $this->roleUserModel->where('user_id', $id)->findAll();

        $data = [
            'user'       => $this->userModel->find($id),
            'validation' => \Config\Services::validation(),
            'roles'      => $this->roleModel->findAll(),
            'roleUsers'  => $roleUsers,
        ];

        return view('user/edit', $data);
    }


    public function save()
    {
        try {

            if (!$this->validate($this->userModel->getValidationRules())) {
                return redirect()->to('/user/create')->withInput();
            }

            $result = $this->userModel->save([
                'name'          => $this->request->getVar('name'),
                'email'         => $this->request->getVar('email'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'no_handphone'  => $this->request->getVar('no_handphone'),
                'address'       => $this->request->getVar('address'),
            ]);

            $dataUser = $this->userModel->where('email', $this->request->getVar('email'))->first();

            foreach ($this->request->getVar('roles') as $role) {
                $dataInsertRoleUser = array(
                    'user_id' => $dataUser['id'],
                    'role_id' => $role,
                );

                $result2 = $this->roleUserModel->save($dataInsertRoleUser);
            }

            if ($result && $result2) {
                session()->setFlashdata("save", "User data has been saved !");
                return redirect()->to('/user')->withInput();
            }
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }

    public function update($id)
    {
        try {

            if (!$this->validate($this->userModel->getValidationRules(['only' => ['name']]))) {
                return redirect()->to('/user/edit/' . $id)->withInput();
            }

            $dataUpdate = [
                'id'            => $id,
                'name'          => $this->request->getVar('name'),
                'no_handphone'  => $this->request->getVar('no_handphone'),
                'address'       => $this->request->getVar('address'),
            ];

            $userBefore = $this->userModel->find($id);
            if ($userBefore['email'] !== $this->request->getVar('email')) {
                $dataUpdate['email'] = $this->request->getVar('email');
            }

            $result = $this->userModel->save($dataUpdate);

            $result2 = $this->roleUserModel->where('user_id', $id)->delete();

            foreach ($this->request->getVar('roles') as $role) {
                $dataInsertRoleUser = array(
                    'user_id' => $id,
                    'role_id' => $role,
                );

                $result3 = $this->roleUserModel->save($dataInsertRoleUser);
            }

            if ($result && $result2 && $result3) {
                session()->setFlashdata("update", "User data has been updated !");
                return redirect()->to('/user');
            }
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->userModel->delete($id);
            $this->roleUserModel->delete(['id' => $id]);

            session()->setFlashdata("delete", "User data has been deleted !");
            return redirect()->to('/user');
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }
}
