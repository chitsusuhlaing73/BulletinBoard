<?php

namespace App\Dao\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Models\Users;
use Auth;

class UserDao implements UserDaoInterface 
{
    /**
     * user store
     *
     * @param Array $store_user
     * @return Users
     */
    public function store($user)
    {
        $store_user = new Users ([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'profile' => $user->profile,
            'type' => $user->type,
            'phone' => $user->phone,
            'dob' => $user->dob,
            'address' => $user->address,
            'create_user_id' => "$user->create_user_id",
            'updated_user_id' => "$user->updated_user_id",
        ]);
        $store_user -> save();
        return back();
    }
}
