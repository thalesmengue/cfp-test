<?php

namespace App\Repositories\Users;

use App\DataTransferObjects\User\UserStoreData;
use App\DataTransferObjects\User\UserUpdateData;
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

    public function create(UserStoreData $data): Model
    {
        return User::create([
            'first_name' => $data->firstName,
            'last_name' => $data->lastName,
            'email' => $data->email,
            'username' => $data->username,
            'mobile' => $data->mobile,
            'password' => $data->password,
        ]);
    }

    public function update(UserUpdateData $data, User $user): bool
    {
        return $user->update([
            'first_name' => $data->firstName,
            'last_name' => $data->lastName,
            'email' => $data->email,
            'username' => $data->username,
            'mobile' => $data->mobile,
            'password' => $data->password,
        ]);
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }
}
