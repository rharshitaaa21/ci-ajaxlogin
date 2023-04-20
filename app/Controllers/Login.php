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

        $data = [$email, $password];
    
        if ($result) { 

            // helper(['form']);
            // $validation = \Config\Services::validation();
        
            // $validation->setRules([
            //     'email' => 'required|valid_email',
            //     'password' => 'required|min_length[6]'
            // ]);
        
            // if (!$validation->withRequest($this->request)->run()) {
            //     // echo view('login');
            //     return $this->response->setJSON([
            //         'status' => 'error',
            //         'errors' => $validation->getErrors()
            //     ]);
            //     // $response = $validation->getErrors();
            //     // echo $response;
            // }
            // else{

            if (password_verify($password, $result->password)) {
                $userData = [
                    'id' => $result->id,
                    'isLoggedIn' => true
                ];

                $this->session->set($userData);
                $response = 'Okay'; 
                return $response;
            }
                // echo view('login', $userData);  
                // return $this->response->setJSON([
                //             'status' => 'success',
                //             'message' => 'Login successful!'
                //         ]);
                        // echo view('login', $userData);
                // $response = 'Login Successful!';
                // echo $response;
                else {   $response = 'Login Failed! Incorrect Password';
                    return $response;
                    
                }
            } 
            else{
                $response= 'User does not exist!';
                return $response;
               
            }  
            $data=[$email, $password, $response];
            // $data = [$response];
            print_r($data);
            return view('login', $data);

}
    
    public function logout()
    {
    $this->session->remove('isLoggedIn');
    //    var_dump('isLoggedIn'); 
     $this->session->destroy();

    // Redirect to login page
     return redirect()->to('/login');
    echo view('dashboard');
 }

    
}




