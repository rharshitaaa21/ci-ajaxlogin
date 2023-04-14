<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Check if user is logged in
        if ( !$this->session->get('isLoggedIn'))
        {
            return redirect()->to('/login');
        }
        else{echo view('dashboard');}

        // Display dashboard page
        
    }
}
