<?php
namespace App\Controllers;
use App\Models\UserModel;
// $validation = \Config\Services::validation();
use CodeIgniter\Controller;
class Register extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function do_register()
    {
        // $userModel = new UserModel();
        $validation = \Config\Services::validation();
        helper('form', 'url');
        // print_r($validation);

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
        //   var_dump($validation);

        $name = $this->request->getPost('name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirmpassword = $this->request->getPost('confirmpassword');

        // var_dump($name);
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
             'confirmpassword' => $confirmpassword,
           
        ];
        //  print_r($data);

        $userModel = new UserModel();
        if ($validation->run($data)) {




            // print_r($data);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $data['password'] = $password;

            // print_r($userModel);
            // print_r($data);
            //  $userModel->insert( 'users', $data);
            // $userModel->getInsertID($data);

            $userModel->insert($data);
            
            $array = array(
                'success'=> '<div class="alert alert-success"> User registered successfully!</div>'
            );

            // $data['success'] = 'User registered successfully!';
            // return view('register', $data);

        } else {
            // $data['errors'] = $validation->getErrors();
            $array= array(
                'error' => true,
                'email_err' => form_error('email'),
                'password_err' => form_error('password'),
                'confirm_err' => form_error('confirm password'),);


        //    return view('register', $data);
        }
        echo json_encode($aray);
        echo view('regiter', $data);

    }
}