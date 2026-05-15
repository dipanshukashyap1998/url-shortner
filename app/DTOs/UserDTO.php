<?php
namespace App\DTOs;

class UserDTO
{
    public function __construct(
    public string $name,
    public string $email,
    )
    {}

     public static function fromRequest(array $data): self
    {
        return new self(
            name: $data['name'],
            email: $data['email'],
            role_id : $data['role_id']
            // created_by : $data['user_id']
        );
    }
}
