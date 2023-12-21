<?php

namespace App\Actions\Users;

use App\Repositories\Users\UserRepository;

class UserDeleteAction
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }
    public function execute($user): bool
    {
        return $this->userRepository->delete($user);
    }
}
