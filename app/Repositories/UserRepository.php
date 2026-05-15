<?php
namespace App\Repositories;

use App\DTOs\UserDTO;
use App\Repositories\Interface\UserRepositoryInterface;
use App\Models\User;
use Override;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function getAllUsers()
    {
        return User::all();
    }

    #[Override]
    public function create(UserDTO $dto)
    {
        return User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => Hash::make('password'),
        ]);

        
    }
}
