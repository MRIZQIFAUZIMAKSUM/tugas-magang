<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data['title']= 'Dashboard';
        return view('admin/index',['error_message'=> $session->getFlashdata('error_message'),$data]);
    }
}
