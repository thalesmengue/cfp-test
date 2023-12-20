<?php

namespace App\Actions\Users;

use App\Repositories\Users\UserRepository;

class UserStoreAction
{
    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    public function execute(array $data)
    {
        return $this->userRepository->create($data);
    }
}
