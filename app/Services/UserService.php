<?php

namespace App\Services;

use App\DTOs\UserDTO;
use App\Repositories\Interface\UserRepositoryInterface;
use Illuminate\Support\Facades\DB;
class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUsers()
    {
        return $this->userRepository->getAllUsers();
    }

    public function createUser(UserDTO $dto)
    {
        return DB::transaction(function() use ($dto){

            $user=$this->userRepository->create($dto);

            return $user;
        });
    }
}
