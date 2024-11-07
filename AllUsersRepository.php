<?php

namespace App\Repositories;

use App\Interfaces\UserRepository;

class AllUsersRepository implements UserRepository
{
    public function get() // Returns all users
    {
        return [];
    }
}