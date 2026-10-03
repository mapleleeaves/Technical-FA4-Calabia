<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    protected $helpers = ['form', 'url'];

    public function login()
    {
        return view('auth/login');
    }

    public function authenticate()
    {
        $rules = [
            'username' => 'required',
            'password' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $user = $userModel
            ->where('username', $this->request->getPost('username'))
            ->first();

        $password = $this->request->getPost('password');

        if ($user && password_verify($password, $user['password'])) {
            session()->set([
                'user_id'    => $user['id'],
                'username'   => $user['username'],
                'full_name'  => $user['full_name'],
                'isLoggedIn' => true
            ]);

            return redirect()->to('/customers');
        }

        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Invalid username or password.');
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}