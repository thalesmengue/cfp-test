<?php

namespace App\Actions\Users;

use App\DataTransferObjects\User\UserUpdateData;
use App\Models\User;
use App\Repositories\Users\UserRepository;

class UserUpdateAction
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function execute(UserUpdateData $data, User $user): bool
    {
        return $this->userRepository->update($data, $user);
    }
}
