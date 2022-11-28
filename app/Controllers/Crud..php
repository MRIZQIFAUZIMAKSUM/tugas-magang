<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Crud extends BaseController
{
    public function create()
    {   
        $validation = \Config\Services::validation();
        $validation->setRules(['title' => 'required']);
        $isDataValid =$validation->withRequest($this->request)->run();

        if($isDataValid){
            $user = new \Myth\Auth\Models\UserModel();
            $user->Insert([
                "username" => $this->request->getPost('title'),
                "" => $this->request->getPost('content'),
                "status" =>  $this->request->getPost('status'),
                "slug" => url_title($this->request->getPost('title'), 'TRUE')
            ]);
            return redirect('admin/news');
        }
        echo view('admin_create_news');
    }
    public function edit ($id)
    {
        $user = new \Myth\Auth\Models\UserModel();
        $data['user'] =$user->where('id', $id)->first();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'username' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if($isDataValid){
            $user->update($id, [
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email'),
                "fullname" => $this->request->getPost('fullname')
            ]);
            return redirect('admin/news');
        }
        echo view('admin_edit_news', $data);
    }
    public function delete ($id)
    {
        return redirect()->back();
    }
}
