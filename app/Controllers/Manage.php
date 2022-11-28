<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manage extends BaseController
{
    public function mitra()
    {
        $data['title']= 'Manage Mitra';
        $db       = \Config\Database::connect();
        $builder  = $db->table('users');
        $builder->select('users.id as userid, username, fullname, user_image, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups.name', 'mitra');
        $query = $builder->get();
        $data['users'] = $query->getResult();
        return view('admin/detailmitra',$data);
    }
    public function staff()
    {
        $data['title']= 'Manage Staff';
        $db       = \Config\Database::connect();
        $builder  = $db->table('users');
        $builder->select('users.id as userid, username, fullname, user_image, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups.name', 'staff');
        $query = $builder->get();
        $data['users'] = $query->getResult();
        return view('admin/detailstaff',$data);
    }
    public function user()
    {
        $data['title']= 'Manage User';
        $db       = \Config\Database::connect();
        $builder  = $db->table('users');
        $builder->select('users.id as userid, username, fullname, user_image, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups.name', 'user');
        $query = $builder->get();
        $data['users'] = $query->getResult();
        return view('admin/detailuser',$data);
    }
    public function admin()
    {
        $data['title']= 'Manage Admin';
        $db       = \Config\Database::connect();
        $builder  = $db->table('users');
        $builder->select('users.id as userid, username, fullname, user_image, email, name');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('auth_groups.name', 'admin');
        $query = $builder->get();
        $data['users'] = $query->getResult();
        return view('superadmin/detailadmin',$data);
    }
    public function empety()
    {
        return view('crud/datakosong');
    }
}
