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
    $response = '';
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
        $response = "Okay" ;
        return $response;
        // echo view('register', $data);
    
    }
     else {
        $errors = $validation->getErrors();
        $response = [];
        foreach ($errors as $error) {
        $response[] = $error->getMessage();
        }
         print_r($response);
        return $response;
    } 
   
      $userdata = [$name, $email, $password,$confirmpassword, $response];

      return view('register', $userdata);  
}

}
