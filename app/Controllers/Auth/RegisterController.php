<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\RoleUserModel;

class RegisterController extends BaseController
{
    protected $userModel, $roleModel, $roleUserModel;

    public function __construct()
    {
        $this->userModel        = new UserModel();
        $this->roleModel        = new RoleModel();
        $this->roleUserModel    = new RoleUserModel();
    }

    public function index()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('auth/register', $data);
    }

    public function save()
    {
        $verifyToken = md5(uniqid(rand(), true));

        try {

            if (!$this->validate($this->userModel->getValidationRules())) {
                return redirect()->to('/register')->withInput();
            }

            $data = [
                'name'          => $this->request->getVar('name'),
                'email'         => $this->request->getVar('email'),
                'password'      => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'no_handphone'  => $this->request->getVar('no_handphone'),
                'address'       => $this->request->getVar('address'),
                'verify_token'  => $verifyToken,
            ];

            $result = $this->userModel->save($data);

            $dataUser = $this->userModel->where('email', $this->request->getVar('email'))->first();

            $dataInsertRoleUser = array(
                'user_id' => $dataUser['id'],
                'role_id' => $this->roleModel->getCostumer(),
            );

            $result2 = $this->roleUserModel->save($dataInsertRoleUser);

            $result3 = $this->sendVerifyMail($verifyToken);

            if ($result && $result2 && $result3) {
                session()->setFlashdata("save", "You have registered, Check your email for confirmation");
                return redirect()->to('/login');
            }
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }

    protected function sendVerifyMail($verifyToken)
    {
        $to = 'strongdeathpeople@gmail.com';
        $subject = 'Email Confirmation For Registration';
        $message = "Please confirmation your account with click link bellow <br><a href='" . base_url('confirm_registration') . "?token=" . $verifyToken . "'>Confirmation Link</a>";

        $email = \Config\Services::email();
        $email->setTo($to);
        $email->setFrom('agusman17drv@gmail.com', 'Confirm Registration');

        $email->setSubject($subject);
        $email->setMessage($message);
        if ($email->send()) {
            return $email->send();
        } else {
            // $data = $email->printDebugger(['headers']);
            // print_r($data);
            return false;
        }
    }

    public function verifyAccount()
    {
        try {
            $verifyToken = $this->request->getVar('token');

            $findVerifyToken = $this->userModel->where('verify_token', $verifyToken)->first();
            if ($findVerifyToken) {
                $data = [
                    'id'        => $findVerifyToken['id'],
                    'verify_at' => Time::now(),
                ];

                $result = $this->userModel->save($data);

                if ($result) {
                    session()->setFlashdata("save", "Your Account have actived");
                    return redirect()->to('/login');
                }
            }
        } catch (\Exception $error) {
            exit("Catch Error : " . $error->getMessage());
        }
    }
}
