<?php

namespace App\Controllers;

use App\Models\UserModel;


class Login extends BaseController
{
    public function __construct()
    {
         
        $this->session 	= \Config\Services::session();
        $this->session->start();
    }

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
                

                $this->session->set($userData);
                
                // return redirect()->to('/dashboard');
                // return $this->response->setJSON(['status' => 'success']);
                echo 'Okay';
            }
            else
            {
                $response = 'Login Failed! Incorrect Password';
                echo  $response ;
                //  $data['error'] = "Incorrect password!";
                //  return $this->response->setJSON(['status' => 'error', 'message' => 'Incorrect password!']);
            }
            }
        
        else
        {
            $response= 'Email does not exist!';
             echo $response;
            // $data['error'] = "Email address not found!";
            // return $this->response->setJSON(['status' => 'error', 'message' => 'Email address not found!']);
        }

       
       
         echo view('login');
       
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