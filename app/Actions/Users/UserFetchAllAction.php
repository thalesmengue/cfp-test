<?php

namespace App\Actions\Users;

use App\Repositories\Users\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class UserFetchAllAction
{
    public function __construct(
        private readonly UserRepository $userRepository
    )
    {
    }

    public function execute(): Collection
    {
        return $this->userRepository->all();
    }
}
