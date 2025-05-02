<?php

namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getById($id);
    public function getAll();
    public function create(User $user);
}
