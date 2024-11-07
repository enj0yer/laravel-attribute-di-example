<?php

use App\Attributes\Inject;
use App\Interfaces\UserRepository;
use App\Repositories\AdminRepository;
use App\Repositories\AllUsersRepository;

class UserController extends Controller
{

    #[Inject(AllUsersRepository::class)]
    protected UserRepository $users;


    #[Inject(AdminRepository::class)]
    protected UserRepository $admins;

    public function getAllUsers()
    {
        return $this->users->get();
    }

    public function getAdmins()
    {
        return $this->admins->get();
    }
}