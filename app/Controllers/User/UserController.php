<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\UserModel;

class UserController extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {

        $dataPerPage = 7;
        $currentPage = $this->request->getVar('page_user') ? $this->request->getVar('page_user') : 1;

        $keyword = $this->request->getVar('keyword');

        if ($keyword) {
            $users = $this->userModel->search('keyword');
        } else {
            $users = $this->userModel;
        }

        $data = [
            'users'         => $users->paginate($dataPerPage, 'user'),
            'pager'         => $this->userModel->pager,
            'currentPage'   => $currentPage,
            'dataPerPage'   => $dataPerPage,
        ];

        return view('user/index', $data);
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('user/create', $data);
    }

    public function edit($id)
    {
        $data = [
            'user' => $this->userModel->find($id),
            'validation' => \Config\Services::validation(),
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

            if ($result) {
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

            if ($result) {
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
            session()->setFlashdata("delete", "User data has been deleted !");
            return redirect()->to('/user');
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }
}
