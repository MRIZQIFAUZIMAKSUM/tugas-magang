<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Staff extends BaseController
{
    public function index()
    {
        $data['title']= 'Staff Dashboard';
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users;
        return view('staff/index',$data);
    }
}
