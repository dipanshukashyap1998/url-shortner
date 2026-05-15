<?php
namespace App\Repositories\Interface;
use App\DTOs\UserDTO;

interface UserRepositoryInterface
{
    public function getAllUsers();
    public function create(UserDTO $dto);
}
