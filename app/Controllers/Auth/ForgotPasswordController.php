<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;

class ForgotPasswordController extends BaseController
{
    public function index()
    {
        return view('auth/forgotPassword');
    }
}
