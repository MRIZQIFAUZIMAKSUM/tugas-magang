<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {    
        $data['title']= 'Dashboard';
    return view('dashboard/index',$data);
    } 

public function user(){
    $data['title']= 'Dashboard';
    return view('dashboard/index',$data);
}
}