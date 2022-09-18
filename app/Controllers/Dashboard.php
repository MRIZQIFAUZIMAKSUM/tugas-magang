<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        return view('dashboard/index',['error_message'=> $session->getFlashdata('error_message')]);
    }
}
