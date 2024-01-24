<?php

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;

class UserValidateAction
{
    public function execute(array $data): bool
    {
        return Auth::attempt($data);
    }
}
