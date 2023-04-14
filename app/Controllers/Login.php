<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Display login page
        echo view('login');
    }

    public function do_login()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $userModel->where('email', $email)->first();

        if ($result)
        {
            if (password_verify($password, $result->password))
            {
                // Set user data in session
                $userData = [
                    'id' => $result->id,
                    'name' => $result->name,
                    'email' => $result->email,
                    'isLoggedIn' => true
                ];
                $this->session->set($userData);
                return redirect()->to('/dashboard');
            }
            else
            {
                $data['error'] = "Incorrect password!";
            }
        }
        else
        {
            $data['error'] = "Email address not found!";
        }

        // Display login page with error message
        echo view('login', $data);
    }

    public function logout()
    {
        // Destroy session
        $this->session->destroy();

        // Redirect to login page
        return redirect()->to('/login');
    }
}
