<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Models\UserModel;

class LoginController extends BaseController
{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $this->userModel->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'            => $data['id'],
                    'email'         => $data['email'],
                    'logged_in'     => TRUE
                ];
                session()->set($ses_data);
                return redirect()->to('/');
            } else {
                session()->setFlashdata('message', 'Wrong Password');
                return redirect()->to('/login');
            }
        } else {
            session()->setFlashdata('message', 'Email not Found');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
