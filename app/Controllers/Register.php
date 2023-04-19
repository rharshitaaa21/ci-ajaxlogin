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
    // $this->load->library('form_validation');
    // $this->load->library('session');

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
            'rules' => 'required|min_length[5]'
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
        // print_r($userModel);

        $password = password_hash($password, PASSWORD_DEFAULT);
        $data['password'] = $password;

        $userModel->insert($data);
       echo json_encode(['success'=>'User added successfully.']);

        return view('register', $data);
    
    }
     else {
        $errors = $validation->getErrors();
        echo json_encode(['error' => $errors]);
         return view('register', $data);
        
    }   
}
}