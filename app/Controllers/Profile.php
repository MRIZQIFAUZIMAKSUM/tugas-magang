<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Profile extends BaseController
{
    public function index()
    {
        $data['title']= 'Dashboard';
        return view('profile/index',$data);
    }
}
