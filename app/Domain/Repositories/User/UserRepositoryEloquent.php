<?php

namespace App\Domain\Repositories\User;

use App\Models\User;
use App\Domain\Contracts\UserContract;

class UserRepositoryEloquent implements UserRepositoryInterface
{
    public function getById(int $id)
    {
        return User::where(UserContract::ID,$id)->first();
    }

    public function create(array $data)
    {
        return  User::create([
            UserContract::NAME      =>  $data[UserContract::NAME],
            UserContract::SURNAME   =>  $data[UserContract::SURNAME],
            UserContract::PHONE     =>  $data[UserContract::PHONE],
            UserContract::CODE      =>  rand(100000,999999),
            UserContract::PASSWORD  =>  bcrypt($data[UserContract::PASSWORD]),
        ]);
    }

    public function updatePhoneVerifiedAt()
    {
        $user   =   backpack_user();
        $user->phone_verified_at    =   date('Y-m-d G:i:s');
        return $user->save();
    }
}
