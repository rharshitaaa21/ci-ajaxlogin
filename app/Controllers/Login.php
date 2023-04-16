<?php

namespace App\Controllers;

use App\Models\UserModel;


class Login extends BaseController
{
    public function __construct()
    {
         
        $this->session 	= \Config\Services::session();
        $this->session->start();
        
        //  print_r($this->session);
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

        // print_r($userModel);

        if ($result)
        {
            if (password_verify($password, $result->password))
            {
                // var_dump($password);
                // var_dump($result);

                $userData = [
                    'id' => $result->id,
                     'isLoggedIn' => true
                ];
                // print_r($result->id);
                // print_r($userData);
                // $this->session->setFlashdata('name',$result->name);

                // var_dump($result);
                // var_dump($result->name);

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
      
    $this->session->remove('isLoggedIn');
    //    var_dump('isLoggedIn'); 
     $this->session->destroy();

    // Redirect to login page
     return redirect()->to('/login');
    echo view('dashboard', $data);
 }

    
}
