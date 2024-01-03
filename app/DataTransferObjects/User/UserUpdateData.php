<?php

namespace App\DataTransferObjects\User;

use App\DataTransferObjects\DataTransferObject;

class UserUpdateData extends DataTransferObject
{
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $email,
        public readonly string $username,
        public readonly string $mobile,
        public readonly ?string $password,
    )
    {
    }

    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'username' => $this->username,
            'mobile' => $this->mobile,
            'password' => $this->password,
        ];
    }
}
