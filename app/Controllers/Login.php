<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session(); 
        $codeigniter_hashed = sha1( "12345" );
        return view('login/index',['error_message'=> $session->getFlashdata('error_message'),'msg'=>$codeigniter_hashed]);
    }
    public function prosesLogin()
    {
        $userid = $this->request->getPost('userid');
        $password =$this->request->getpost('password');

        $password_sh1 = sha1($password);

        $user_model = new \App\Models\User();

        $user = $user_model->GetUserLogin($userid, $password_sh1);
        
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
