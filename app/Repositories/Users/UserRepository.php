<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Repositories\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UserRepository implements RepositoryInterface
{
    public function all(): Collection
    {
        return User::all();
    }

    public function create(array $data): Model
    {
        return User::create($data);
    }

    public function update(array $data, User $user): bool
    {
        return $user->update($data);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
