<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Repositories\Users\UserRepository;

class UserDeleteAction
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }
    public function execute(User $user): bool
    {
        return $this->userRepository->delete($user);
    }
}
