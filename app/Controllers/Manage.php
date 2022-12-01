<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Manage extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
     $this->db      = \config\Database::connect();
     $this->builder = $this->db->table('users');  
    }
    public function mitra()
    {
        $data['title']= 'Mitra List';

        $this->builder->select('users.id as userid, username, fullname, user_image, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups.name', 'mitra');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('crud/readlist',$data);
    }
    public function staff()
    {
        $data['title']= 'Staff List';

        $this->builder->select('users.id as userid, username, fullname, user_image, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups.name', 'staff');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('crud/readlist',$data);
    }
    public function user()
    {
        $data['title']= 'User List';

        $this->builder->select('users.id as userid, username, fullname, user_image, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups.name', 'user');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('crud/readlist',$data);
    }
    public function admin()
    {
        $data['title']= 'Admin List';

        $this->builder->select('users.id as userid, username, fullname, user_image, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('auth_groups.name', 'admin');
        $query = $this->builder->get();
        $data['users'] = $query->getResult();
        return view('crud/readlist',$data);
    }
    public function createindex()
    {
        return view('crud/createuser.php');
    }
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
    public function editindex($id){
         $data['title'] ='Edit User';
     
         $this->builder->select('users.id as userid, username, fullname, user_image, email, name, status_message');
         $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
         $this->builder->join('auth_groups', 'auth_groups.id =auth_groups_users.group_id');
         $this->builder->where('users.id', $id);
         $query = $this->builder->get();
     
         $data['user'] = $query->getRow();
     
         if (empty($data['user']) || $id == 0) {
            return redirect()->back();
         }
         return view('crud/updateuser', $data);
        
    }
    public function edit()
    {
        $userId = $this->request->getVar('id');
        $user = new \Myth\Auth\Models\UserModel();
        $data['user'] =$user->where('id', $userId)->first();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'username' => 'required'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        
        if($isDataValid){
            $user->update($userId, [
                "username" => $this->request->getPost('username'),
                "email" => $this->request->getPost('email'),
                "fullname" => $this->request->getPost('fullname')
            ]);
            return redirect('/');
        }
        echo view('crud/updateuser', $data);
    }
    public function delete($id)
    {            
        print($id);
        $user = new \Myth\Auth\Models\UserModel();
        $user->delete($id,true);
        return redirect()->back();
    }

    /**
     * @param string $password Password
     */
    public static function hash(string $password): string
    {
        $config = config('Auth');

        if (
            (defined('PASSWORD_ARGON2I') && $config->hashAlgorithm === PASSWORD_ARGON2I)
            || (defined('PASSWORD_ARGON2ID') && $config->hashAlgorithm === PASSWORD_ARGON2ID)
        ) {
            $hashOptions = [
                'memory_cost' => $config->hashMemoryCost,
                'time_cost'   => $config->hashTimeCost,
                'threads'     => $config->hashThreads,
            ];
        } else {
            $hashOptions = [
                'cost' => $config->hashCost,
            ];
        }

        return password_hash(
            self::preparePassword($password),
            $config->hashAlgorithm,
            $hashOptions
        );
    }

    /**
     * @param string $password Password
     * @param string $hash     Hash
     */
    public static function verify(string $password, string $hash): bool
    {
        return password_verify(self::preparePassword($password), $hash);
    }

    /**
     * @param string     $hash    Hash
     * @param int|string $algo    Hash algorithm
     * @param array      $options Options
     */
    public static function needsRehash(string $hash, $algo, array $options = []): bool
    {
        return password_needs_rehash($hash, $algo, $options);
    }

    /**
     * @param string $password Password
     */
    protected static function preparePassword(string $password): string
    {
        return base64_encode(hash('sha384', $password, true));
    }

}
