<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Register extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function do_register()
{
    $validation = \Config\Services::validation();

    $rules = [
        'name' => [
            'label' => 'Full Name',
            'rules' => 'required|min_length[3]'
        ],
        'email' => [
            'label' => 'Email Address',
            'rules' => 'required|valid_email|is_unique[users.email]'
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required|min_length[5]|alpha_numeric'
        ],
        'confirmpassword' => [
            'label' => 'Confirm Password',
            'rules' => 'required|matches[password]'
        ]
    ];

    $validation->setRules($rules);

    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $confirmpassword = $this->request->getPost('confirmpassword');

    $data = [
        'name' => $name,
        'email' => $email,
        'password' => $password,
        'confirmpassword' => $confirmpassword
    ];

    if ($validation->run($data)) {
        $userModel = new UserModel();

        $password = password_hash($password, PASSWORD_DEFAULT);
        $data['password'] = $password;

        $userModel->insert($data);

        $response = ['status' => 'success', 'message' => 'User registered successfully!'];
        return $this->response->setJSON($response);
        return view('register', $data);
        // return;
    } else {
        $response = ['status' => 'error', 'message' => $validation->getErrors()];
        return $this->response->setJSON($response);
        return view('register', $data);
        // return;
    }
}

public function register()
{
    var_dump("check");
    return view('register');
}
}