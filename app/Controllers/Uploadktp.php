<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Uploadktp extends BaseController
{
    public function index()
    {
      $data['title']= 'Dashboard';
        return view('ktp/index',$data);
    }
    public function uploadktp()
    {  
 
      helper(['uploadktp', 'url']);
         
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
             $avatar->move(WRITEPATH . 'uploads');
 
           $data = [
 
             'ktp' =>  $avatar->getClientName(),
           ];
 
           $save = $builder->insert($data);
           $msg = 'File has been uploaded';
         }
 
        return redirect()->to( base_url('/uploadktp') )->with('msg', $msg);
 
     }
 
}
