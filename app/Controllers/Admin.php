<?php

namespace App\Controllers;

use App\Controllers\BaseController;


class Admin extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
     $this->db      = \config\Database::connect();
     $this->builder = $this->db->table('users');  
    }
     

    public function index()
    {
        $data['title']= 'Admin Dashboard';

        $this->builder->select('users.id as userid, username, fullname, user_image, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id =auth_groups_users.group_id');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        if (empty($data['user'])) {
            return view('crud/datakosong',$data);
         }
        return view('admin/index',$data);
    }
  
    public function detail($id = 0)
    {
     $data['title'] ='User Detail';
 
     $this->builder->select('users.id as userid, username, fullname, user_image, email, name, status_message');
     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
     $this->builder->join('auth_groups', 'auth_groups.id =auth_groups_users.group_id');
     $this->builder->where('users.id', $id);
     $query = $this->builder->get();
 
     $data['user'] = $query->getRow();
 
     if (empty($data['user']) || $id == 0) {
        return view('crud/datakosong',$data);
     }

     return view('admin/detail', $data);
    }
   
}