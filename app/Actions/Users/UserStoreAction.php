<?php

namespace App\Actions\Users;

use App\DataTransferObjects\User\UserStoreData;
use App\Repositories\Users\UserRepository;
use Illuminate\Database\Eloquent\Model;

class UserStoreAction
{
    public function __construct(
        private readonly UserRepository $userRepository,
    )
    {
    }

    public function execute(UserStoreData $data): Model
    {
        return $this->userRepository->create($data);
    }
}
