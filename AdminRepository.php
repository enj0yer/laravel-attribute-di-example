<?php 

namespace App\Repositories;

use App\Interfaces\UserRepository;

class AdminRepository implements UserRepository
{
    public function get() // Returns all admins
    {
        return [];
    }
}