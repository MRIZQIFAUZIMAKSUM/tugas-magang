<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Changepswd extends BaseController
{      
	
	public function change_pass()
    {
        $session = \Config\Services::session();
            $userid=$this->request->getpost('userid');
			$old_pass=$this->request->getpost('old_pswd');
            $old_pass = sha1($old_pass);
			$new_pass=$this->request->getpost('new_pswd');
            $new_pass = sha1($new_pass);
            echo $new_pass;
            $user_model = new \App\Models\User();
            $data['id'] = $user_model->where('userid', $userid)->first();
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'userid' => 'required',
                'old_pswd' => 'required'
            ]);
            $isDataValid = $validation->withRequest($this->request)->run();
            // jika data vlid, maka simpan ke database
            if($isDataValid){
                $user_model->update(1,[
                    "password" => $new_pass,
                ]);
                
            $session ->setFlashdata(['error_message'=> 'password telah diganti silahkan llogin kembali']);
            return redirect()->to(base_url('/login'));
            }
            
            $session ->setFlashdata(['error_message'=> 'password telah diganti silahkan llogin kembali']);
            return redirect()->to(base_url('/login'));
        
    }
				
    public function index()
    {
        $session = \Config\Services::session();
        return view('changepswd/index',['error_message'=> $session->getFlashdata('error_message')]);
    }
    
}
