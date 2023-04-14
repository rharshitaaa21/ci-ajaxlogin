<?php

namespace App\Controllers;

use \App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    { 
       
        echo view('login');
        
    }

    public function do_login()
    {
        $userModel = new UserModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $result = $userModel->where('email', $email)->first();
       // print_r($_POST);


        if ($result)
        {
            if (password_verify($password, $result->password))
            {
                $user = $result;
                $this->session->set("user",$result);
                return redirect()->to('/dashboard');
            }
            else
            {
                // echo "Incorrect password!";
                $data['error'] = "Incorrect password!";
            }
        }
        else
        {
            // echo "Email address not found!";
            $data['error'] = "Email address not found!";
        }
        $data['title'] = 'Login';
        echo view('common/header', $data);
        echo view('login', $data);
        echo view('common/footer');
    } 

    public function logout()
{
    $this->session->sess_destroy();
    redirect('login');
}

}