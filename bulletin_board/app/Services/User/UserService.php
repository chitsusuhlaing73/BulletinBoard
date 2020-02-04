<?php

namespace App\Services\User;

use App\Contracts\Dao\User\UserDaoInterface;
use App\Contracts\Services\User\UserServiceInterface;
use Hash;
use App\Models\Users;
use Auth;

class UserService implements UserServiceInterface
{
    private $userDao;

    /**
     * Constructor
     *
     * @param userDaoInterface $userDao
     */
    public function __construct(UserDaoInterface $userDao)
    {
        $this->userDao = $userDao;
    }

    /**
     * user create confirm
     *
     * @param Request $request
     * @return void
     */
    public function confirm($request)
    {
        $user = new Users;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        $profile = $request->file('file');
        $profileImage = $profile -> getClientOriginalName();
        $path = public_path('/image');
        $profile -> move($path, $profileImage);

        $user->file = $profileImage;
        $user->type = $request->type;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $user->address = $request->address;
        return $user;
    }

    /**
     * store user function
     *
     * @param Request $request
     * @return void
     */
    public function store($request) 
    {
        $user = new Users;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $password = $request->input('password');
        $hash = bcrypt($password);
        $user->password = $hash;
        $user->profile = $request->file ;
        $user->type = $request->type;
        $user->phone = $request->input('phone');
        $user->dob = $request->dob;
        $user->address = $request->address;
        $user->create_user_id = Auth::user()->id;
        $user->updated_user_id = Auth::user()->id;
        $user->created_at = now();
        $user->updated_at = now();
        return $this->userDao->store($user);
    }
}