<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Register extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session(); 
        return view('register/index',['error_message'=> $session->getFlashdata('error_message')]);
    }
    public function prosesRegister()
    {
        $userid = $this->request->getPost('userid');
        $email = $this->request->getPost('email');
        $password =$this->request->getpost('password');

        $password_sh1 = sha1($password);

        $user_model = new \App\Models\User();

        $user = $user_model($userid,$email, $password_sh1);
        
        $session = \Config\Services::session();
        if($user) {
            $session->set(['user'=> $user]);
            return redirect()->to(base_url('/dashboard'));
        }else {

            $session ->setFlashdata(['error_message'=> 'userId dan Password tidak sesuai']);
            return redirect()->to(base_url('/login'));
         }
    }
}
