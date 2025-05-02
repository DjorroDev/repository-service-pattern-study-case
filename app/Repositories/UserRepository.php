<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function getById($id) {
        return User::find($id);
    }
    public function getAll(){
        return User::all();
    }
    public function create(User $user){
        $user->save();
        return $user;
    }
}
