<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Repositories\Users\UserRepository;

class UserUpdateAction
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function execute(array $data, User $user): bool
    {
        if (blank($data['password'])) {
            unset ($data['password']);
        }

        return $this->userRepository->update($data, $user);
    }
}
