<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class User extends BaseController
{
    public function index()
    {
        $data['title']= 'Admin Dashboard';
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users;
        return view('user/index',$data);
    }
}
