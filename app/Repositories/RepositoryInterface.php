<?php

namespace App\Repositories;

use App\DataTransferObjects\User\UserStoreData;
use App\DataTransferObjects\User\UserUpdateData;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all(): Collection;

    public function create(UserStoreData $data): Model;

    public function update(UserUpdateData $data, User $user): bool;

    public function delete(User $user): bool;
}
