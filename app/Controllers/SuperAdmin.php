<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class SuperAdmin extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
     $this->db      = \config\Database::connect();
     $this->builder = $this->db->table('users');  
    }
     
    public function index()
    {
        $data['title']= 'Super Admin Dashboard';
        $users = new \Myth\Auth\Models\UserModel();
        $data['users'] = $users;
        return view('superadmin/index',$data);
    }
    public function detail($id = 0)
    {
     $data['title'] ='User Detail';
 
     $this->builder->select('users.id as userid, username, fullname, user_image, email, name');
     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
     $this->builder->join('auth_groups', 'auth_groups.id =auth_groups_users.group_id');
     $this->builder->where('users.id', $id);
     $query = $this->builder->get();
 
     $data['user'] = $query->getRow();
 
     if (empty($data['user']) || empty($id)) {
     }

     return view('admin/detail', $data);
    }
}
