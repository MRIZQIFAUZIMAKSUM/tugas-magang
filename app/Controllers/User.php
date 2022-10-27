<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        $data['title']= 'Dashboard';
        return view('user/index',['error_message'=> $session->getFlashdata('error_message'),$data]);
    }
}
