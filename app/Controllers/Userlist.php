<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Userlist extends BaseController
{
    public function index()
    {
        $data['title']= 'Dashboard';
        return view('users/index',$data);

    }
}
