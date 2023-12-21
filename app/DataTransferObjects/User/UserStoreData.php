<?php

namespace App\DataTransferObjects\User;

use App\DataTransferObjects\DataTransferObject;

class UserStoreData extends DataTransferObject
{
    public function __construct(
        public string $firstName,
        public string $lastName,
        public string $email,
        public string $username,
        public string $mobile,
        public string $password,
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
