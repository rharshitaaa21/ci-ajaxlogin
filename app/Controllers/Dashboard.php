<?php
namespace App\Controllers;
// use App\Controllers\Login;
class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index()
    {

        // print_r($session);
        if (!$this->session->has('isLoggedIn') || !$this->session->get('isLoggedIn')) {
            return redirect()->to('/login');
        } else {
            echo view('dashboard');
        }
    }
    
}
