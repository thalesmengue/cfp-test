<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all(): Collection;

    public function create(array $data): Model;

    public function update(array $data, User $user): bool;

    public function delete(User $user): bool;
}
