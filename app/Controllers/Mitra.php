<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Mitra extends BaseController
{
    public function index()
    {
        $data['title']= 'Mitra Dashboard';
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users;
        return view('mitra/index',$data);
    }
}
