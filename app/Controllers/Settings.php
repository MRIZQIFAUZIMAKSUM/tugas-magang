<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\User;

class Settings extends BaseController
{
    public function index()
    {
        $data['title']= 'Dashboard';
        return view('settings/index',$data);
    }
    public function pp()
    {
        $data['title']= 'Dashboard';
        return view('pp/index',$data);
    }
    // public function changepassword()
    // {
    //     $userid = $this->request->getPost('userid');
    //     $old_pswd = $this->request->getPost('old_pswd');
    //     $new_pswd =$this->request->getpost('new_pswd');

    //     $password_sh1 = sha1($old_pswd);

    //     $user_model = new User();

    //     $user = $user_model->GetUserLogin($userid, $password_sh1);
        
    //     $session = \Config\Services::session();
    //     if($user) {
    //         $session->set(['user'=> $user]);
    //         $user_model = new \App\Models\User();

    //         $user = $user_model->GetUserLogin($userid, $new_pswd);
    //         return redirect()->to(base_url('/dashboard'));
    //     }else {

    //         $session ->setFlashdata(['error_message'=> 'userId dan Password tidak sesuai']);
    //         return redirect()->to(base_url('/login'));
    //      }
    // }
    public function imgprofile()
    {  
 
      helper(['settings', 'url']);
         
      $db      = \Config\Database::connect();
          $builder = $db->table('admin_users');
 
         $validated = $this->validate([
             'file' => [
                 'uploaded[file]',
                 'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                 'max_size[file,4096]',
             ],
         ]);
 
         $msg = 'Please select a valid file';
  
         if ($validated) {
             $avatar = $this->request->getFile('file');
             $avatar->move(FCPATH . 'uploads');
 
           $data = [
             'photo' =>  $avatar->getClientName(),
           ];
 
           //$save = $builder->update(set:'user_image' = $avatar->getClientName());
           $msg = 'File has been uploaded';
         }
 
        return redirect()->to( base_url('/profile') )->with('msg', $msg);
 
     }
 
     public function uploadktp()
     {  
  
       helper(['settings', 'url']);
          
       $db = \Config\Database::connect();
           $builder = $db->table('admin_users');
  
          $validated = $this->validate([
              'file' => [
                  'uploaded[file]',
                  'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
                  'max_size[file,4096]',
              ],
          ]);
  
          $msg = 'Please select a valid file';
   
          if ($validated) {
              $avatar = $this->request->getFile('file');
              $avatar->move(FCPATH . 'uploads');
  
            $data = [
  
              'ktp' =>  $avatar->getClientName(),
            ];
  
            $save = $builder->insert($data);
            $msg = 'File has been uploaded';
          }
  
         return redirect()->to( base_url('/profile') )->with('msg', $msg);
  
      }
}
