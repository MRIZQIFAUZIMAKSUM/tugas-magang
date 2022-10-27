<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data['title']= 'Admin LTE | Dashboard';
        return view('dashboard',$data);
    }
}
